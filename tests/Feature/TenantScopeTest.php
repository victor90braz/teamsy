<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\File as FacadesFile;
use Spatie\Backtrace\File;
use Tests\TestCase;

class TenantScopeTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function test_has_a_tenant_id_on_the_migration(): void
    {
        $now = now();

        $this->artisan('make:model Test -m');

        $filename = $now->year . '_' . $now->format('m') . '_' . $now->format('d') . '_' . $now->format('h') . '_' . $now->format('i') . '_' . $now->format('s') . '_create_tests_table.php';

        $this->assertTrue(FacadesFile::exists(database_path('migrations/'.$filename)));

        FacadesFile::delete(database_path('migrations/'.$filename));
        FacadesFile::delete(app_path('Test.php'));
    }
}
