<?php

namespace Nabcellent\Laraconfig\Migrator\Pipes;

use Closure;
use Nabcellent\Laraconfig\Eloquent\Metadata;
use Nabcellent\Laraconfig\Migrator\Data;

/**
 * @internal
 */
class LoadMetadata
{
    /**
     * Handles the Settings migration.
     *
     * @param Data    $data
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle(Data $data, Closure $next): mixed
    {
        $data->metadata = Metadata::all()->keyBy(static fn(Metadata $metadata): string => $metadata->name);

        return $next($data);
    }
}
