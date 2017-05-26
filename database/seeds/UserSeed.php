<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'last_name' => '', 'email' => 'admin@admin.com', 'phone' => '', 'password' => '$2y$10$mqxPylrVaJZ1YoJUqrFqOu2Nf6tNm2I/BWVg0tll0n3KzH9UihtCi', 'role_id' => 1, 'remember_token' => '',],
            ['id' => 2, 'name' => 'Petras', 'last_name' => 'Petraitis', 'email' => 'petras@gmail.com', 'phone' => '81123456', 'password' => '$2y$10$AC8DrgLnfrKwoAX9/z4/ue7spFNmysVhDyS/XhCIALkegvAx033G6', 'role_id' => 2, 'remember_token' => null,],
            ['id' => 3, 'name' => 'Jonas', 'last_name' => 'Jonaitis', 'email' => 'jonas@gmail.com', 'phone' => '861133344', 'password' => '$2y$10$SWjeMwsXKvfVyEhFSzXX6u0IEbgSzALjGfXCnCJ2wxJ8WfTf3h6KW', 'role_id' => 2, 'remember_token' => null,],
            ['id' => 4, 'name' => 'Antanas', 'last_name' => 'Antanaitis', 'email' => 'antanas@gmail.com', 'phone' => '861222344', 'password' => '$2y$10$kINVRnNZhOtrsi.pRs.vMeWkjCL/MMs9AodU3PtJBF5L1tLasEzYu', 'role_id' => 2, 'remember_token' => null,],
            ['id' => 5, 'name' => 'Tomas', 'last_name' => 'Tomaitis', 'email' => 'tomas@gmail.com', 'phone' => '861244355', 'password' => '$2y$10$Xq/sNDmmzzBCQtI/jV0a/e4uefhUSupGdYgS4d3bwM6.yOQSVCXeq', 'role_id' => 3, 'remember_token' => null,],
            ['id' => 6, 'name' => 'Rokas', 'last_name' => 'Rokaitis', 'email' => 'rokas@gmail.com', 'phone' => '861011121', 'password' => '$2y$10$KTWlpYHZj8SGdHLfUPNEi.KOO41LA3XFS6sqIb2Rjihh3/iCgmYMe', 'role_id' => 3, 'remember_token' => null,],
            ['id' => 7, 'name' => 'Mindaugas', 'last_name' => 'Mindaugaitis', 'email' => 'mindaugas@gmail.com', 'phone' => '861055433', 'password' => '$2y$10$tw/TI3knjhzevB8fQuX1z.A5yWe98fqu2DEp1RiNBh9YOnYl6cA6i', 'role_id' => 3, 'remember_token' => null,],
            ['id' => 8, 'name' => 'Vytautas', 'last_name' => 'Vytautaitis', 'email' => 'vytautas@gmail.com', 'phone' => '861322222', 'password' => '$2y$10$dalXqfBWGlz0BnpiFTJzt.6vgBKWX0sqjb9l7f2Dcos1A1CBKpFDm', 'role_id' => 3, 'remember_token' => null,],
            ['id' => 9, 'name' => 'Egidijus', 'last_name' => 'Egidijaitis', 'email' => 'egidijus@gmail.com', 'phone' => '861422333', 'password' => '$2y$10$Mlq7WTwx0AEfcsNw5IEgoOFtwBqx3tqOh6PKoaFY.2mEzwQfn1zBq', 'role_id' => 3, 'remember_token' => null,],
            ['id' => 10, 'name' => 'Gediminas', 'last_name' => 'Gediminaitis', 'email' => 'gediminas@gmail.com', 'phone' => '8618886755', 'password' => '$2y$10$JMq/xVSOA0CnStsaQvVLceLjfB7Ud1gwnRi8rtbsMb5DVbQ7kd/xK', 'role_id' => 3, 'remember_token' => null,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
