<?php

namespace App\Http\Controllers\Admin;

use Log;
use Response;
use Storage;
use Request;
use League\Flysystem\Adapter\Local;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class BackupController extends Controller
{
	/**
     * Adding auth & 2FA middleware to this controller.
     *
     */
    public function __construct()
	{
		$this->middleware(['auth','verified','2fa','is_admin']);
	}

	/*
	 * Display the Backups Page
	 */
    public function index()
    {
    	$this->data['backups'] = [];

    	$disk_name = 'local';
    	$disk = Storage::disk($disk_name);
    	$adapter = $disk->getDriver()->getAdapter();
    	$files = $disk->allFiles();

    	// make an array of the backup files along with their filesize and creation date
    	foreach ($files as $k => $f)
    	{	
    		// only take the zip files into account
    		if (substr($f, -4) == '.zip' && $disk->exists($f)) {
    			$this->data['backups'][] = [
    				'file_path' => $f,
    				'file_name' => str_replace('backups/','',$f),
    				'file_size' => $disk->size($f),
    				'last_modified' => $disk->lastModified($f),
    				'disk' => $disk_name,
    				'download' => true,
    			];
    		}
    	}
    	
    	// reverse the backups so the newest one would be on the top
    	$this->data['backups'] = array_reverse($this->data['backups']);
    	$this->data['title'] = 'Backups';
    	return view('ui.admin.manager.backups', $this->data);
    }

	/*
	 * Adding Mysql Dump Path for DB Backup
	 */
	public function addPath()
	{
        $path = Request::input('path');
		setting()->set('app_mysql_dump_path', $path);
		setting()->save();
		return back()->with('success', 'Path Added Successfully');
	}

    /*
     * Create a new Backup.
     */
    public function create()
    {
    	try {
    		ini_set('max_execution_time', 600);

    		// start the backup process
			Artisan::call('backup:run');

    		$output = Artisan::output();
    		dd($output);

    		// log the results
    		Log::info("Backup Manager - New Backup started from the Admin interface \r\n".$output);

    		// return the results as a response to the ajax call
    		echo $output;

    	} catch (Exception $e) {
    		Response::make($e->getMessage(), 500);
    	}

    	return 'success';
    }

    /*
     * Downloads a Backup zip file.
     */
    public function download()
    {
    	$disk  = Storage::disk(Request::input('disk'));
    	$file_name = Request::input('file_name');
    	$adapter = $disk->getDriver()->getAdapter();

    	if ($adapter instanceof Local) {
    		$storage_path = $disk->getDriver()->getAdapter()->getPathPrefix();

    		if($disk->exists($file_name))
    		{
    			return response()->download($storage_path.$file_name);
    		} else {
    			abort(404, 'Sorry, Backup Doesnt Exists');
    		}
    	} else {
    		abort(404, 'Only Local Downloads Supported');
    	}
    }

    /*
     * Deletes a Backup file.
     */
    public function delete($file_name)
    {
    	$disk = Storage::disk(Request::input('disk'));

    	if($disk->exists($file_name))
    	{
    		$disk->delete($file_name);

    		return back()->with('success', 'Backup Deleted Successfully');

    	} else {
    		abort(404, 'Backup Doesnt Exists');
    	}
    }
}
