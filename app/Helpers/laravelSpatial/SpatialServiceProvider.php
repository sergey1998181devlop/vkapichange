<?php

namespace App\Helpers\laravelSpatial;

use Doctrine\DBAL\Types\Type as DoctrineType;
use App\Helpers\laravelSpatial\Connectors\ConnectionFactory;
use App\Helpers\laravelSpatial\Doctrine\Geometry;
use App\Helpers\laravelSpatial\Doctrine\GeometryCollection;
use App\Helpers\laravelSpatial\Doctrine\LineString;
use App\Helpers\laravelSpatial\Doctrine\MultiLineString;
use App\Helpers\laravelSpatial\Doctrine\MultiPoint;
use App\Helpers\laravelSpatial\Doctrine\MultiPolygon;
use App\Helpers\laravelSpatial\Doctrine\Point;
use App\Helpers\laravelSpatial\Doctrine\Polygon;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\DatabaseServiceProvider;

/**
 * Class DatabaseServiceProvider.
 */
class SpatialServiceProvider extends DatabaseServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // The connection factory is used to create the actual connection instances on
        // the database. We will inject the factory into the manager so that it may
        // make the connections while they are actually needed and not of before.
        $this->app->singleton('db.factory', function ($app) {
            return new ConnectionFactory($app);
        });

        // The database manager is used to resolve various connections, since multiple
        // connections might be managed. It also implements the connection resolver
        // interface which may be used by other components requiring connections.
        $this->app->singleton('db', function ($app) {
            return new DatabaseManager($app, $app['db.factory']);
        });

        if (class_exists(DoctrineType::class)) {
            // Prevent geometry type fields from throwing a 'type not found' error when changing them
            $geometries = [
                'geometry'           => Geometry::class,
                'point'              => Point::class,
                'linestring'         => LineString::class,
                'polygon'            => Polygon::class,
                'multipoint'         => MultiPoint::class,
                'multilinestring'    => MultiLineString::class,
                'multipolygon'       => MultiPolygon::class,
                'geometrycollection' => GeometryCollection::class,
            ];
            $typeNames = array_keys(DoctrineType::getTypesMap());
            foreach ($geometries as $type => $class) {
                if (!in_array($type, $typeNames)) {
                    DoctrineType::addType($type, $class);
                }
            }
        }
    }
}
