<?php

use PSX\Module\ViewAbstract;

class index extends ViewAbstract
{
	public function onLoad()
	{
		header('X-XRDS-Location: ' . $this->config['psx_url'] . '/' . $this->config['psx_dispatch'] . 'yadis/xrds');

		$this->template->assign('tests', $this->loadTests());

		$this->template->set('index.tpl');
	}

	private function loadTests()
	{
		$tests = array();
		$files = scandir(PSX_PATH_MODULE);

		foreach($files as $f)
		{
			$i = PSX_PATH_MODULE . '/' . $f;
			$e = pathinfo($i);

			if($f[0] != '.' && is_dir($i))
			{
				array_push($tests, array(

					'href' => $this->config['psx_url'] . '/' . $this->config['psx_dispatch'] . $e['filename'],
					'file' => ucfirst($e['filename']),

				));
			}
		}

		return $tests;
	}
}