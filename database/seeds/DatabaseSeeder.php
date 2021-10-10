<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminActionsTableSeeder::class);
        $this->call(AdminGroupTitlesTableSeeder::class);
        $this->call(AdminGroupsTableSeeder::class);
        $this->call(AdminGroupPagesTableSeeder::class);
        $this->call(UserTypesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UserRightsTableSeeder::class);
        $this->call(MlsMasterTableSeeder::class);
        $this->call(MlsClassTableSeeder::class);
        $this->call(MlsFieldsMappingTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(ParametersTableSeeder::class);
    }
}
