<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable()->after('id');
            $table->string('last_name')->nullable()->after('first_name');
            $table->string('vanity_tag')->nullable()->after('last_name');
        });

        foreach (User::all() AS $user) {
            $names = explode(' ', $user->name);
            $user->first_name = $names[0];

            unset($names[0]);
            $user->last_name = implode(' ', $names);

            $user->vanity_tag = strtolower(fake()->word());
            $user->save();
        }

        Schema::table('users', function (Blueprint $table) {
            $table->unique('vanity_tag', 'vanity_tag_unique');
        });

        Schema::dropColumns('users', ['name']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable()->after('id');
        });

        foreach (User::all() AS $user) {
            $user->name = sprintf('%s %s', $user->first_name, $user->last_name);
            $user->save();
        }

        Schema::dropColumns('users', ['first_name']);
        Schema::dropColumns('users', ['last_name']);
        Schema::dropColumns('users', ['vanity_tag']);
    }
};
