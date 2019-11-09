<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Critic;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_admin = Role::where('name', 'admin')->first();
      $role_user = Role::where('name', 'user')->first();
      $role_critic = Role::where('name', 'critic')->first();

      $admin = new User();
      $admin->name = 'Matthew Collins';
      $admin->email = 'admin@media.ie';
      $admin->password=bcrypt('secret');
      $admin->save();
      $admin->roles()-> attach($role_admin);

      $user = new User();
      $user->name = 'Luke Collins';
      $user->email = 'luke@media.ie';
      $user->password=bcrypt('secret');
      $user->save();
      $user->roles()-> attach($role_user);

      $user = new User();
      $user->name = 'Darren Fagan';
      $user->email = 'Darren@media.ie';
      $user->password=bcrypt('secret');
      $user->save();
      $user->roles()-> attach($role_critic);

   }
}
