<?php

// namespace Illuminate\Auth\Passwords;

// use Carbon\Carbon;
// use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
// use Illuminate\Database\ConnectionInterface;
// use Illuminate\Support\Str;

// class DatabaseTokenRepository implements TokenRepositoryInterface {
// 	/**
// 	 * The database connection instance.
// 	 *
// 	 * @var \Illuminate\Database\ConnectionInterface
// 	 */
// 	protected $connection;

// 	/**
// 	 * The token database table.
// 	 *
// 	 * @var string
// 	 */
// 	protected $table = 'user_activation';

// 	/**
// 	 * The hashing key.
// 	 *
// 	 * @var string
// 	 */
// 	protected $hashKey;

// 	/**
// 	 * The number of seconds a token should last.
// 	 *
// 	 * @var int
// 	 */
// 	protected $expires;

// 	/**
// 	 * Create a new token repository instance.
// 	 *
// 	 * @param  \Illuminate\Database\ConnectionInterface  $connection
// 	 * @param  string  $table
// 	 * @param  string  $hashKey
// 	 * @param  int  $expires
// 	 * @return void
// 	 */
// 	public function __construct(ConnectionInterface $connection, $table, $hashKey, $expires = 60) {
// 		$this->table      = $table;
// 		$this->hashKey    = $hashKey;
// 		$this->expires    = $expires*60;
// 		$this->connection = $connection;
// 	}

// 	/**
// 	 * Create a new token record.
// 	 *
// 	 * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
// 	 * @return string
// 	 */
// 	public function create(CanResetPasswordContract $user) {
// 		$email = $user->getEmailForPasswordReset();

// 		$this->deleteExisting($user);

// 		// We will create a new, random token for the user so that we can e-mail them
// 		// a safe link to the password reset form. Then we will insert a record in
// 		// the database so that we can verify the token within the actual reset.
// 		$token = $this->createNewToken();

// 		$this->getTable()->insert($this->getPayload($email, $token));

// 		return $token;
// 	}

// 	/**
// 	 * Delete all existing reset tokens from the database.
// 	 *
// 	 * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
// 	 * @return int
// 	 */
// 	protected function deleteExisting(CanResetPasswordContract $user) {
// 		return $this->getTable()->where('email', $user->getEmailForPasswordReset())->delete();
// 	}

// 	/**
// 	 * Build the record payload for the table.
// 	 *
// 	 * @param  string  $email
// 	 * @param  string  $token
// 	 * @return array
// 	 */
// 	protected function getPayload($email, $token) {
// 		return ['email' => $email, 'token' => $token, 'created_at' => new Carbon];
// 	}

// 	/**
// 	 * Determine if a token record exists and is valid.
// 	 *
// 	 * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
// 	 * @param  string  $token
// 	 * @return bool
// 	 */
// 	public function exists(CanResetPasswordContract $user, $token) {
// 		$email = $user->getEmailForPasswordReset();

// 		$token = (array) $this->getTable()->where('email', $email)->where('token', $token)->first();

// 		return $token && !$this->tokenExpired($token);
// 	}

// 	/**
// 	 * Determine if the token has expired.
// 	 *
// 	 * @param  array  $token
// 	 * @return bool
// 	 */
// 	protected function tokenExpired($token) {
// 		$expiresAt = Carbon::parse($token['created_at'])->addSeconds($this->expires);

// 		return $expiresAt->isPast();
// 	}

// 	/**
// 	 * Delete a token record by token.
// 	 *
// 	 * @param  string  $token
// 	 * @return void
// 	 */
// 	public function delete($token) {
// 		$this->getTable()->where('token', $token)->delete();
// 	}

// 	/**
// 	 * Delete expired tokens.
// 	 *
// 	 * @return void
// 	 */
// 	public function deleteExpired() {
// 		$expiredAt = Carbon::now()->subSeconds($this->expires);

// 		$this->getTable()->where('created_at', '<', $expiredAt)->delete();
// 	}

// 	/**
// 	 * Create a new token for the user.
// 	 *
// 	 * @return string
// 	 */
// 	public function createNewToken() {
// 		return hash_hmac('sha256', Str::random(40), $this->hashKey);
// 	}

// 	/**
// 	 * Begin a new database query against the table.
// 	 *
// 	 * @return \Illuminate\Database\Query\Builder
// 	 */
// 	protected function getTable() {
// 		return $this->connection->table($this->table);
// 	}

// 	*
// 	 * Get the database connection instance.
// 	 *
// 	 * @return \Illuminate\Database\ConnectionInterface

// 	public function getConnection() {
// 		return $this->connection;
// 	}
// }

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Connection;

class ActivationRepository {

	protected $db;

	protected $table = 'user_activations';

	public function __construct(Connection $db) {
		$this->db = $db;
	}

	protected function getToken() {
		return hash_hmac('sha256', str_random(40), config('app.key'));
	}

	public function createActivation($user) {

		$activation = $this->getActivation($user);

		if (!$activation) {
			return $this->createToken($user);
		}
		return $this->regenerateToken($user);

	}

	private function regenerateToken($user) {

		$token = $this->getToken();
		$this->db->table($table)->where('id', $user->id)->update([
				'token'      => $token,
				'created_at' => new Carbon()
			]);
		return $token;
	}

	private function createToken($user) {
		$token = $this->getToken();
		$this->db->table($this->table)->insert([
				'id'         => $user->id,
				'token'      => $token,
				'created_at' => new Carbon()
			]);
		return $token;
	}

	public function getActivation($user) {
		return $this->db->table($this->table)->where('id', $user->id)->first();
	}

	public function getActivationByToken($token) {
		return $this->db->table($this->table)->where('token', $token)->first();
	}

	public function deleteActivation($token) {
		$this->db->table($this->table)->where('token', $token)->delete();
	}

}