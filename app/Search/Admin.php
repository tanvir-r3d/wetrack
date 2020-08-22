<?php

namespace App\Search;

use Algolia\ScoutExtended\Searchable\Aggregator;
use Laravel\Scout\Searchable;

class Admin extends Aggregator
{
    /**
     * The names of the models that should be aggregated.
     *
     * @var string[]
     */
    protected $models = [
        \App\Company::class,
        \App\Branch::class,
        \App\Employee::class,
        \App\EmployeeCategory::class,

    ];

    public function shouldBeSearchable()
    {
        // Check if the class uses the Searchable trait before calling shouldBeSearchable
        if (array_key_exists(Searchable::class, class_uses($this->model))) {
            return $this->model->shouldBeSearchable();
        }
    }
}
