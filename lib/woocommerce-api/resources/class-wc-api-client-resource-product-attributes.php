<?php
/**
 * WC API Client Product Attributes resource class
 *
 * @since 2.0
 */
class WC_API_Client_Resource_Product_Attributes extends WC_API_Client_Resource {


	/**
	 * Setup the resource
	 *
	 * @since 2.0
	 * @param WC_API_Client $client class instance
	 */
	public function __construct( $client ) {

		parent::__construct( 'product', 'attribute', $client );
	}


	/**
	 * Get attributes
	 *
	 * GET /attributes
	 * GET /attributes/#{id}
	 *
	 * @since 2.0
	 * @param null|int $id attribute ID or null to get all attributes
	 * @param array $args acceptable attributes endpoint args, like `filter[]`
	 * @return array|object attributes!
	 */
	public function get( $id = null, $args = array() ) {

		$this->set_request_args( array(
			'method' => 'GET',
			'path'   => $id,
			'params' => $args,
		) );

		return $this->do_request();
	}


	/**
	 * Create a attribute
	 *
	 * POST /attributes
	 *
	 * @since 2.0
	 * @param array $data valid attribute data
	 * @return array|object your newly-created attribute
	 */
	public function create( $data ) {

		$this->set_request_args( array(
			'method' => 'POST',
			'body'   => $data,
		) );

		return $this->do_request();
	}


	/**
	 * Update a attribute
	 *
	 * PUT /attribute/#{id}
	 *
	 * @since 2.0
	 * @param int $id attribute ID
	 * @param array $data attribute data to update
	 * @return array|object your newly-updated attribute
	 */
	public function update( $id, $data ) {

		$this->set_request_args( array(
			'method' => 'PUT',
			'path'   => $id,
			'body'   => $data,
		) );

		return $this->do_request();
	}


	/**
	 * Delete a attribute
	 *
	 * DELETE /attributes/#{id}
	 *
	 * @since 2.0
	 * @param int $id attribute ID
	 * @param bool $force true to permanently delete the attribute, false to trash it
	 * @return array|object response
	 */
	public function delete( $id, $force = false ) {

		$this->set_request_args( array(
			'method' => 'DELETE',
			'path'   => $id,
			'params' => array( 'force' => $force ),
		) );

		return $this->do_request();
	}


	/**
	 * Get a list of attribute terms
	 *
	 * GET /attributes/#{id}/terms
	 *
	 * @since 2.0
	 * @param array $args acceptable attribute endpoint args, like `type` or `filter[]`
	 * @return array|object the count
	 */
	public function get_terms( $id = null, $args = array() ) {

		$this->set_request_args( array(
			'method' => 'GET',
			'path'   => "$id/terms",
			'params' => $args,
		) );

		return $this->do_request();
	}

}

