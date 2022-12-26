<?php

namespace App\Traits;

trait HasTimestamps
{
    public function getTimestamp(string $columnName = 'created_at')
    {
        return [
            'created_at' => $this->$columnName->format('Y-m-d H:i:s'),
            'created_at_friendly' => $this->$columnName->diffForHumans()
        ];
    }
}
