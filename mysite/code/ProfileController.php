<?php

class ProfileController extends Controller {
	private static $allowed_actions = array (
		'register',
		'verify',
		'RegisterForm'
	);

	public function register() {
		return $this->customise(array(
			'Title' => 'Register'
		))->renderWith(array(__CLASS__ . '_' . __FUNCTION__, 'Page'));
	}

	public function verify() {
		return $this->customise(array(
			'Title' => 'Verify Email'
		))->renderWith(array(__CLASS__ . '_' . __FUNCTION__, 'Page'));
	}

	/**
	 * Register Form.
	 *
	 * @return Form
	 */
	public function RegisterForm() {
		$form_name = 'RegisterForm';

		$email_field = EmailField::create('Email');
		$password_field = ConfirmedPasswordField::create('Password');

		$fields = FieldList::create(
			$email_field,
			$password_field
		);

		$form_action = FormAction::create('submitRegisterForm', 'Register');

		$actions = FieldList::create(
			$form_action
		);

		$validator = RequiredFields::create(
			'Email',
			'Password'
		);

		$form = Form::create($this, $form_name, $fields, $actions, $validator);
		$form->setFormAction(Controller::join_links('/profile', __FUNCTION__));

		return $form;
	}

	/**
	 * Submit action for Register Form.
	 *
	 * @param array $data
	 * @param Form $form
	 *
	 * @return SS_HTTPResponse
	 */
	public function submitRegisterForm($data, $form) {
		// Check for an existing member with this email address
		$existing_member_with_email = Member::get()->filter(array(
			'Email' => $data['Email']
		))->first();

		if ($existing_member_with_email) {
			$validation_message = "Sorry, that email address is already being used. Please choose another.";

			$form->sessionMessage($validation_message, 'bad');

			return $this->redirectBack();
		}

		// Create the new member
		$member = Member::create();
		$form->saveInto($member);
		$member->write();

		return $this->redirect('/profile/verify');
	}
}
