<?php

# Remove the default place schema from rank math
add_filter( 'rank_math/json_ld', function( $data, $jsonld ) {
    if (isset( $data['publisher'] ) ) {
        unset( $data['publisher'] );
    }           
    unset( $data['place'] );
    return $data;        
}, 99, 2);