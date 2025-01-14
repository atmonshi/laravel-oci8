<?php

namespace Yajra\Oci8\Tests\Functional;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Yajra\Oci8\Tests\TestCase;

class ConnectionTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_works_on_connection_with_prefix()
    {
        $connection = $this->getConnection();

        $this->assertSame('test_', $connection->getTablePrefix());

        $first = $connection->table('users')->first();

        $this->assertSame('Record-1', $first->name);
    }

    /**
     * Set up the environment.
     *
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);

        $app['config']->set('database.connections.oracle.prefix', 'test_');
    }
}
