<?php

$exhibitions = array_values(
    $page
        -> children()
        -> listed()
        -> published()
        -> flip()
        -> toArray( function ( $exhibition ) {
            $poster = $exhibition -> files() -> template('poster') -> first();
            return [
                'title' => (string) $exhibition -> title(),
                'url' => (string) $exhibition -> uri(),
                'poster' => $poster != null ? srcs( $poster ) : null
            ];
        })
);

echo json_encode( $exhibitions );
