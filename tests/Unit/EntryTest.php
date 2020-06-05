<?php

namespace Tests\Unit;

use App\Entry;
use Tests\TestCase;

class EntryTest extends TestCase
{
    public function testEntriable()
    {
        $entry = factory(Entry::class)->create();

        $this->assertTrue($entry->entriable()->exists());
    }
}
