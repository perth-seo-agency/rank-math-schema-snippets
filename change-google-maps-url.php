<?php
/*
 * Filter The Value Of The Rank Math "hasMap" Schema Property.
 * 
 * By default, Rank Math uses a Google Maps URL that only contains the coordinates.
 * 
 * However, it should use the CID URL vs just using the coordinates.
 */

// Remove the defaul Rank Math "coordinates"
add_filter( 'rank_math/json_ld', function( $data, $jsonld ) {
    if ( isset( $data['place'] ) && isset( $data['place']['hasMap'] ) ) {
        unset( $data['place']['hasMap'] );
    }
    return $data;
}, 99, 2);

// Add custom hasMap property using the Google Maps Profile's CID URL
add_filter( 'rank_math/json_ld', function( $data, $jsonld ) {
	if ( isset($data['place']) ) {
		$data['place']['hasMap'] = 'https://www.google.com/maps?cid=17018878135737943086';
	}
	return $data;
}, 99, 2);