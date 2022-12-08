<?php

namespace Tests\Feature;

use Tests\TestCase;

class CommandTraitTest extends TestCase
{
    /**
     * @test
     */
    public function command_exits()
    {
        $this->artisan('make:trait BelongsToSomething')
            ->expectsConfirmation("This will create Trait 'BelongsToSomething' in App\Trait namespace. Continue?", 'yes')
            ->expectsOutput("Trait 'BelongsToSomething' has been created successfully")
            ->assertExitCode(0);
    }
}
