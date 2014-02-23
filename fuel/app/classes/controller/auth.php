<?php

class Controller_Auth extends Controller {
	private function getGdataInstance() {
		return Gdata::forge('Calendar', 'default', Config::load('google'));
	}

	public function action_login() {
		$g = $this->getGdataInstance();
		$g->client->setScopes(array(
			'https://www.googleapis.com/auth/calendar'
		));
		Response::redirect($g->client->createAuthUrl());
	}

	public function action_callback() {
		// 認証に必要なコード(URLにくっついてる)を取得
		$code = Input::get('code');

		$g = $this->getGdataInstance();
		$g->client->authenticate($code);	// 認証

		// カレンダー一覧を取得
		$calendars = $g->service->calendarList->listCalendarList();

		// 試しに出力
		Debug::dump($calendars);
		exit;
	}
}