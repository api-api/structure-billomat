<?php
/**
 * Structure_Billomat class
 *
 * @package APIAPI\Structure_Billomat
 * @since   1.0.0
 */

namespace APIAPI\Structure_Billomat;

use APIAPI\Core\Structures\Structure;
use APIAPI\Core\Request\Method;

if ( ! class_exists( 'APIAPI\Structure_Billomat\Structure_Billomat' ) ) {

	/**
	 * Structure implementation for Billomat.
	 *
	 * @since 1.0.0
	 */
	class Structure_Billomat extends Structure {
		/**
		 * Sets up the API structure.
		 * This method should populate the routes array, and can also be used to
		 * handle further initialization functionality, like setting the authenticator
		 * class and default authentication data.
		 *
		 * @since 1.0.0
		 */
		protected function setup() {
			$this->title         = 'Billomat API';

			$this->description   = 'Allows to access and manage the data in your Billomat account.';
			$this->base_uri      = 'https://{billomatID}.billomat.net/api/';

			// The following parameter is internal since it is part of authentication.
			$this->base_uri_params['billomatID'] = array(
				'description' => 'billomatID of the account.',
				'internal'    => true,
			);

			$this->authenticator = 'x-account';
			$this->authentication_data_defaults = array(
				'placeholder_name' => 'billomatID',
				'header_name'      => 'BillomatApiKey',
			);

			$this->routes['/clients'] = array(
				'methods' => array(
					Method::GET  => array(
						'description'          => 'Lists customers without checking upper- and lowercase.',
						'needs_authentication' => true,
						'params'               => array(
							'name'          => array(
								'description' => 'Company name of the client.',
								'type'        => 'string',
							),
							'client_number' => array(
								'description' => 'Client number of the client',
								'type'        => 'string',
							),
							'email'         => array(
								'description' => 'Email address of the client',
								'type'        => 'string',
							),
							'first_name'    => array(
								'description' => 'First name of the client.',
								'type'        => 'string',
							),
							'last_name'     => array(
								'description' => 'Last name of the client.',
								'type'        => 'string',
							),
							'country_code'  => array(
								'description' => 'Country code in ISO 3166 Alpha-2 format.',
								'type'        => 'string',
							),
							'note'          => array(
								'description' => 'Notes for customer.',
								'type'        => 'string',
							),
							'invoice_id'    => array(
								'description' => 'The ID for a bill for this customer, different values separated by comma.',
								'type'        => 'string',
							),
							'tags'          => array(
								'description' => 'Comma separated list of tags.',
								'type'        => 'string',
							),
						),
					),
					Method::POST => array(
						'description'          => 'Creates a customer.',
						'needs_authentication' => true,
						'request_data_type'    => 'json',
						'parent_nodes'         => array( 'client' ),
						'params'               => array(
							'number_pre'               => array(
								'description' => 'Prefix',
								'type'        => 'string'
							),
							'number'                   => array(
								'description' => 'Sequential number.',
								'type'        => 'integer'
							),
							'number_length'            => array(
								'description' => 'Minimum length of the customer number (will be filled up with leading nulls)',
								'type'        => 'integer'
							),
							'name'                     => array(
								'description' => 'Company name of the client.',
								'type'        => 'string',
							),
							'street'                   => array(
								'description' => 'Street of the client.',
								'type'        => 'string',
							),
							'city'                     => array(
								'description' => 'City of the client.',
								'type'        => 'string',
							),
							'state'                    => array(
								'description' => 'State of the client.',
								'type'        => 'string',
							),
							'country_code'             => array(
								'description' => 'Country code in ISO 3166 Alpha-2 format.',
								'type'        => 'string',
							),
							'first_name'               => array(
								'description' => 'First name of the client.',
								'type'        => 'string',
							),
							'last_name'                => array(
								'description' => 'Last name of the client.',
								'type'        => 'string',
							),
							'salutation'               => array(
								'description' => 'Salutation of the client.',
								'type'        => 'string',
							),
							'phone'                    => array(
								'description' => 'Phone number of the client.',
								'type'        => 'string',
							),
							'fax'                      => array(
								'description' => 'Fax number of the client.',
								'type'        => 'string',
							),
							'mobile'                   => array(
								'description' => 'Mobile number of the client.',
								'type'        => 'string',
							),
							'email'                    => array(
								'description' => 'Email address of the client',
								'type'        => 'string',
							),
							'www'                      => array(
								'description' => 'Website of the client',
								'type'        => 'string',
							),
							'tax_number'               => array(
								'description' => 'Tax number of the client',
								'type'        => 'string',
							),
							'vat_number'               => array(
								'description' => 'Vat number of the client',
								'type'        => 'string',
							),
							'bank_account_number'      => array(
								'description' => 'Bank account number.',
								'type'        => 'string',
							),
							'bank_account_owner'       => array(
								'description' => 'Bank account owner.',
								'type'        => 'string',
							),
							'bank_number'              => array(
								'description' => 'Bank Identification Code.',
								'type'        => 'string',
							),
							'bank_name'                => array(
								'description' => 'Bank name.',
								'type'        => 'string',
							),
							'bank_swift'               => array(
								'description' => 'SWIFT/BIC.',
								'type'        => 'string',
							),
							'bank_iban'                => array(
								'description' => 'IBAN.',
								'type'        => 'string',
							),
							'sepa_mandate'             => array(
								'description' => 'Mandate reference of a SEPA debit mandate.',
								'type'        => 'string',
							),
							'sepa_mandate_date'        => array(
								'description' => 'Date of the SEPA debit mandate.',
								'type'        => 'string',
							),
							'locale'                   => array(
								'description' => 'Scheme of the area of the customer',
								'type'        => 'string',
							),
							'tax_rule'                 => array(
								'description' => 'Tax, no tax or country.',
								'type'        => 'string',
							),
							'net_gross'                => array(
								'description' => 'Price base.',
								'type'        => 'string',
							),
							'default_payment_types'    => array(
								'description' => 'Payment types (for example CASH, BANK_TRANSFER, PAYPAL..). Different payment types can be added comma separated.',
								'type'        => 'string',
							),
							'note'                     => array(
								'description' => 'Notes for customer.',
								'type'        => 'string',
							),
							'reduction'                => array(
								'description' => 'Discount in percent.',
								'type'        => 'float',
							),
							'discount_rate_type'       => array(
								'description' => 'Type of standard value for discount.',
								'type'        => 'string',
							),
							'discount_rate'            => array(
								'description' => 'Discount in percent.',
								'type'        => 'float',
							),
							'discount_days_type'       => array(
								'description' => 'Type of standard value for discount period.',
								'type'        => 'string',
							),
							'discount_days'            => array(
								'description' => 'Discount period in days after bill date.',
								'type'        => 'float',
							),
							'due_days_type'            => array(
								'description' => 'Type of standard value for due.',
								'type'        => 'integer',
							),
							'reminder_due_days_type'   => array(
								'description' => 'Type of standard value for due reminder.',
								'type'        => 'string',
							),
							'reminder_due_days'        => array(
								'description' => 'Due reminder.',
								'type'        => 'integer',
							),
							'offer_validity_days_type' => array(
								'description' => 'Type of standard value offer validity.',
								'type'        => 'string',
							),
							'offer_validity_days'      => array(
								'description' => 'Offer validity in days.',
								'type'        => 'integer',
							),
							'currency_code'            => array(
								'description' => 'Currency ISO code.',
								'type'        => 'string',
							),
							'price_group'              => array(
								'description' => 'Price group',
								'type'        => 'integer',
							)
						)
					)
				),
			);

			$this->routes['/clients/myself'] = array(
				'methods' => array(
					Method::GET => array(
						'description'          => 'Returns all data of the own account.',
						'needs_authentication' => true,
						'params'               => array(),
					),
				),
			);

			$this->routes['/clients/(?P<id>[\\d]+)'] = array(
				'methods' => array(
					Method::GET => array(
						'description'          => 'Returns data of a client.',
						'needs_authentication' => true,
						'params'               => array(),
					),
				),
			);

			$this->routes['/invoices/(?P<id>[\\d]+)'] = array(
				'methods' => array(
					Method::GET => array(
						'description'          => 'Returns data of an invoice.',
						'needs_authentication' => true,
						'params'               => array(),
					),
				),
			);

			$this->routes['/invoices'] = array(
				'methods' => array(
					Method::POST => array(
						'description'          => 'Creates a new bill.',
						'needs_authentication' => true,
						'params'               => array(
							'client_id'        => array(
								'description' => 'Customer ID',
								'type'        => 'integer',
							),
							'contact_id'        => array(
								'description' => 'Contact ID',
								'type'        => 'integer',
								'required'    => false,
							),
							'address'        => array(
								'description' => 'Invoice address',
								'type'        => 'string',
								'required'    => false,
							),
							'number_pre'        => array(
								'description' => 'Number Prefix',
								'type'        => 'string',
								'required'    => false,
							),
							'number'        => array(
								'description' => 'Number',
								'type'        => 'integer',
								'required'    => false,
							),
							'number_length'        => array(
								'description' => 'Number length',
								'type'        => 'integer',
								'required'    => false,
							),
							'date'        => array(
								'description' => 'Invoice Date',
								'type'        => 'string',
								'required'    => false,
							),
							'supply_date'        => array(
								'description' => 'Supply Date',
								'type'        => 'string',
								'required'    => false,
							),
							'supply_date_type'        => array(
								'description' => 'Supply Date Type (Available values: SUPPLY_DATE, DELIVERY_DATE, SUPPLY_TEXT, DELIVERY_TEXT)',
								'type'        => 'string',
								'required'    => false,
							),
							'due_days'        => array(
								'description' => 'Due Days',
								'type'        => 'integer',
								'required'    => false,
							),
							'discount_rate'        => array(
								'description' => 'Discount Rate (in percent)',
								'type'        => 'integer',
								'required'    => false,
							),
							'discount_days'        => array(
								'description' => 'Discount Days',
								'type'        => 'integer',
								'required'    => false,
							),
							'discount_date'        => array(
								'description' => 'Discount Date',
								'type'        => 'string',
								'required'    => false,
							),
							'title'        => array(
								'description' => 'Document Title',
								'type'        => 'string',
								'required'    => false,
							),
							'label'        => array(
								'description' => 'Document Label',
								'type'        => 'string',
								'required'    => false,
							),
							'intro'        => array(
								'description' => 'Intro Text',
								'type'        => 'string',
								'required'    => false,
							),
							'note'        => array(
								'description' => 'Note',
								'type'        => 'string',
								'required'    => false,
							),
							'reduction'        => array(
								'description' => 'Price Reduction (in percent)',
								'type'        => 'string',
								'required'    => false,
							),
							'currency_code'        => array(
								'description' => 'Currency Code (ISO)',
								'type'        => 'string',
								'required'    => false,
							),
							'net_gross'        => array(
								'description' => 'Price Base (Available values: NET, GROSS)',
								'type'        => 'string',
								'required'    => false,
							),
							'quote'        => array(
								'description' => 'Currency Rate',
								'type'        => 'string',
								'required'    => false,
							),
							'payment_types'        => array(
								'description' => 'Payment Types (Comma separated)',
								'type'        => 'string',
								'required'    => false,
							),
							'invoice_id'        => array(
								'description' => 'Invoice ID',
								'type'        => 'integer',
								'required'    => false,
							),
							'offer_id'        => array(
								'description' => 'Offer ID',
								'type'        => 'integer',
								'required'    => false,
							),
							'confirmation_id'        => array(
								'description' => 'Confirmation ID',
								'type'        => 'integer',
								'required'    => false,
							),
							'recurring_id'        => array(
								'description' => 'Recurring ID',
								'type'        => 'integer',
								'required'    => false,
							),
							'free_text_id'        => array(
								'description' => 'Free Text ID',
								'type'        => 'integer',
								'required'    => false,
							),
							'template_id'        => array(
								'description' => 'Template ID',
								'type'        => 'integer',
								'required'    => false,
							),
							// Invoice Items?
						),
					),
				),
			);

			$this->routes['/invoices/(?P<id>[\\d]+)'] = array(
				'methods' => array(
					Method::PUT => array(
						'description'          => 'Edits an invoice.',
						'needs_authentication' => true,
						'params'               => array(
							'client_id'        => array(
								'description' => 'Customer ID',
								'type'        => 'integer',
							),
						),
					),
					Method::DELETE => array(
						'description'          => 'Edits an invoice.',
						'needs_authentication' => true,
						'params'               => array(
							'client_id'        => array(
								'description' => 'Customer ID',
								'type'        => 'integer',
							),
						),
					),
				)
			);

			$this->routes['/invoices/(?P<id>[\\d]+)/complete'] = array(
				'methods' => array(
					Method::PUT => array(
						'description'          => 'Completes an invoice.',
						'needs_authentication' => true,
					),
				),
			);

			$this->routes['/invoices/(?P<id>[\\d]+)/pdf'] = array(
				'methods' => array(
					Method::GET => array(
						'description'          => 'Returns an invoice PDF.',
						'needs_authentication' => true,
					),
				),
			);

			$this->routes['/invoices/(?P<id>[\\d]+)/email'] = array(
				'methods' => array(
					Method::POST => array(
						'description'          => 'Sends an invoice via email.',
						'needs_authentication' => true,
						'params'               => array(
							'email_template_id'   => array(
								'description'     => 'Email Template ID',
								'type'            => 'integer',
								'required'    => false,
							),
							'from'   => array(
								'description'     => 'Email From Address',
								'type'            => 'string',
								'required'    => false,
							),
							'recipients'   => array(
								'description'     => 'Email Recipients',
								'type'            => 'integer',
								'required'    => true,
								// Sub parameters
							),
							'subject'   => array(
								'description'     => 'Email Subject',
								'type'            => 'string',
							),
							'body'   => array(
								'description'     => 'Email Body',
								'type'            => 'integer',
							),
							'filename'   => array(
								'description'     => 'Invoice Filename',
								'type'            => 'integer',
							),
							'attachments'   => array(
								'description'     => 'Email Template ID',
								'type'            => 'integer',
								// Sub parameters
							),
						),
					),
				),
			);

			$this->routes['/invoices/(?P<id>[\\d]+)/mail'] = array(
				'methods' => array(
					Method::POST => array(
						'description'          => 'Sends an invoice via email.',
						'needs_authentication' => true,
						'params'               => array(
							'color'   => array(
								'description'     => 'Color Print (Available values: true or false)',
								'type'            => 'boolean',
								'required'    => false,
							),
							'duplex'   => array(
								'description'     => 'Duplex Print (Available values: true or false)',
								'type'            => 'boolean',
								'required'    => false,
							),
							'paper_weight'   => array(
								'description'     => 'Paper weight (Available values: 80, 90)',
								'type'            => 'integer',
								'required'    => false,
							),
							'attachments'   => array(
								'description'     => 'PDF files which have to be printed too',
								'type'            => 'boolean',
								'required'    => false,
								// Subparams
							),
						),
					),
				),
			);

		}
	}
}
