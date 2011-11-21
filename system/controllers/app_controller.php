<?php
/**
 * Traq
 * Copyright (C) 2009-2011 Jack Polgar
 * 
 * This file is part of Traq.
 * 
 * Traq is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; version 3 only.
 * 
 * Traq is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Traq. If not, see <http://www.gnu.org/licenses/>.
 */

require APPPATH . '/common.php';
require APPPATH . '/version.php';

/**
 * App controller
 *
 * @author Jack P.
 * @since 3.0
 * @package Traq
 * @subpackage Controllers
 */
class AppController extends Controller
{
	public $project = null;
	
	public function __construct()
	{
		parent::__construct();
		
		// Load helpers
		Load::helper('html', 'js');
		
		View::$theme = 'default';
		
		View::set('title', settings('title'));
		View::set('traq', $this);
		
		// Check if we're on a project page and get the project info
		if ($this->project = is_project(Request::seg(0)) and $this->project->($this->user->group_id, 'view'))
		{
			View::set('project', $this->project);
		}
		else
		{
			View::set('request', Request::url());
			$this->_render['view'] = 'error/404';
		}
	}
}