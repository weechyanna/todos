<?php
namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

class TodosMigrationTest extends TestCase{
	/**
   * @test
   *
   * @return void
   */
  public function it_has_todos_table(){
    $this->assertTrue(Schema::hasTable('todos'));
  }
  /**
   * @test
   *
   */
  public function it_has_column_id(){
    $this->assertTrue(Schema::HasColumn('todos', 'id'));
  }
	/**
	 * @test
	 *
	 */
	public function it_has_column_title(){
		$this->assertTrue(Schema::HasColumn('todos', 'title'));
	}
	/**
	 * @test
	 *
	 */
	public function it_has_column_completed(){
		$this->assertTrue(Schema::HasColumn('todos', 'completed'));
	}
	/**
	 * @test
	 *
	 */
	public function it_has_column_user_id(){
		$this->assertTrue(Schema::HasColumn('todos', 'user_id'));
	}
}
