<?php

$poster = $page -> files() -> template('poster') -> first();
$works = $page -> files() -> template('artwork');

echo json_encode([
    'title' => (string) $page -> title(),
    'poster' => $poster != null ? srcs( $poster ) : null,
    'startDate' => (string) $page -> startDate() -> date(),
    'endDate' => (string) $page -> endDate() -> date(),
    'location' => (string) $page -> location(),
    'description' => (string) $page -> description(),
    'credits' => $page -> credits() -> yaml(),
    'exhibitionWorks' => array_values( $page -> files() -> template('artwork') -> toArray( function ( $file ) {
        return [
            'file' => srcs( $file ),
            'caption' => (string) $file -> caption()
        ];
    }))
]);