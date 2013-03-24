<?php
class User extends Eloquent {
	public static $timestamps = true;
	public function profile() {
		return $this->has_one('Profile');
	}
}
?>