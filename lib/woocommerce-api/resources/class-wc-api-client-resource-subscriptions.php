<?php
/**
 * WC API Client Subscriptions resource class
 *
 * The API endpoints supporting this clase are only when 
 * WooCommerce Subscriptions is installed on the server 
 * (https://www.woothemes.com/products/woocommerce-subscriptions/).
 *
 */
class WC_API_Client_Resource_Subscriptions extends WC_API_Client_Resource {


	/**
	 * Setup the resource
	 *
	 * @param WC_API_Client $client class instance
	 */
	public function __construct( $client ) {
		parent::__construct( 'subscriptions', 'subscription', $client );
	}


	/**
	 * Get subscriptions
	 *
	 * GET /subscriptions
	 * GET /subscriptions/#{id}
	 *
	 * @param null|int $id subscription ID or null to get all subscriptions
	 * @param array $args acceptable subscription endpoint args, like `status`
	 * @return array|object subscriptions!
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
	 * Create a subscription
	 *
	 * POST /subscriptions
	 *
	 * @param array $data valid subscription data
	 * @return array|object your newly-created subscription
	 */
	public function create( $data ) {

		$this->set_request_args( array(
			'method' => 'POST',
			'body'   => $data,
		) );

		return $this->do_request();
	}


	/**
	 * Update an subscription
	 *
	 * PUT /subscriptions/#{id}
	 *
	 * @param int $id subscription ID
	 * @param array $data subscription data to update
	 * @return array|object your newly-updated subscription
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
	 * Delete a subscription
	 *
	 * DELETE /subscriptions/#{id}
	 *
	 * @param int $id subscription ID
	 * @param bool $force true to permanently delete the subscription, false to trash it
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
	 * Get a count of subscriptions
	 *
	 * GET /subscriptions/count
	 *
	 * @param array $args acceptable subscription endpoint args, like `status`
	 * @return array|object the count
	 */
	public function get_count( $args = array() ) {

		$this->set_request_args( array(
			'method' => 'GET',
			'path'   => 'count',
			'params' => $args,
		) );

		return $this->do_request();
	}


	/**
	 * Get a list of valid subscription statuses
	 *
	 * GET /subscriptions/statuses
	 *
	 * @return array|object subscription statuses
	 */
	public function get_statuses() {

		$this->set_request_args( array(
			'method' => 'GET',
			'path'   => 'statuses',
		) );

		return $this->do_request();
	}


	/** Convenience methods - these do not map directly to an endpoint ********/


	/**
	 * Update the status for an subscription
	 *
	 * PUT /subscriptions/#{id} with status
	 *
	 * @param int $id subscription ID
	 * @param string $status valid subscription status
	 * @return array|object newly-updated subscription
	 */
	public function update_status( $id, $status ) {

		$this->set_request_args( array(
			'method' => 'PUT',
			'path'   => $id,
			'body'   => array( 'status' => $status ),
		) );

		return $this->do_request();
	}


}

