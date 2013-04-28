<?php

/*
 * This script deletes releases that match certain criteria, type php removeCrapReleases.php false for details.
 */

define('FS_ROOT', realpath(dirname(__FILE__)));
require_once(FS_ROOT."/../../../www/config.php");
require_once(FS_ROOT."/../../../www/lib/framework/db.php");
require_once(FS_ROOT."/../../../www/lib/releases.php");

if (isset($argv[1]) && $argv[1] == "true")
{
	function deleteReleases($sql, $type)
	{
		$releases = new Releases();
		$delcount = 0;
		foreach ($sql as $rel)
		{
			echo "Deleting, ".$type.": ".$rel['searchname']."\n";
			$releases->delete($rel['ID']);
			$delcount++;
		}
		return $delcount;
	}

	// 15 or more letters or numbers, nothing else.
	function deleteGibberish()
	{
		$type = "Gibberish";
		$db = new Db;
		$sql = $db->query("select ID, searchname from releases where searchname REGEXP '^[a-zA-Z0-9]{15,}$'");
		$delcount = deleteReleases($sql, $type);
		return $delcount;
	}
	
	// 25 or more letters/numbers, probably hashed.
	function deleteHashed()
	{
		$type = "Hashed";
		$db = new Db;
		$sql = $db->query("select ID, searchname from releases where searchname REGEXP '[a-zA-Z0-9]{25,}'");
		$delcount = deleteReleases($sql, $type);
		return $delcount;
	}
	
	// 5 or less letters/numbers.
	function deleteShort()
	{
		$type = "Short";
		$db = new Db;
		$sql = $db->query("select ID, searchname from releases where searchname REGEXP '^[a-zA-Z0-9]{0,5}$'");
		$delcount = deleteReleases($sql, $type);
		return $delcount;
	}
	
	// Anything smaller than 30MB with an exe not in other misc or pc apps.
	function deleteExe()
	{
		$type = "EXE";
		$db = new Db;
		$sql = $db->query('select r.ID, r.searchname from releases r left join releasefiles rf on rf.releaseID = r.ID where rf.name like "%.exe%" and r.size < 30000000 and r.categoryID not in (4010, 4020, 4030, 4040, 4050, 4060, 4070, 7010)');
		$delcount = deleteReleases($sql, $type);
		return $delcount;
	}
	
	// Anything with a password.url file.
	function deletePasswordURL()
	{
		$type = "PasswordURL";
		$db = new Db;
		$sql = $db->query('select r.ID, r.searchname from releases r left join releasefiles rf on rf.releaseID = r.ID where rf.name like "%password.url%"');
		$delcount = deleteReleases($sql, $type);
		return $delcount;
	}

	$totalDeleted = 0;
	$gibberishDeleted = 0;
	$hashedDeleted = 0;
	$shortDeleted = 0;
	$exeDeleted = 0;
	$PURLDeleted = 0;
	
	if (isset($argv[2]))
	{
		if ($argv[2] == "gibberish")
			$gibberishDeleted = deleteGibberish();
		if ($argv[2] == "hashed")
			$hashedDeleted = deleteHashed();
		if ($argv[2] == "short")
			$shortDeleted = deleteShort();
		if ($argv[2] == "exe")
			$exeDeleted = deleteExe();
		if ($argv[2] == "passwordurl")
			$PURLDeleted = deletePasswordURL();
	}
	else
	{
		$gibberishDeleted = deleteGibberish();
		$hashedDeleted = deleteHashed();
		$shortDeleted = deleteShort();
		$exeDeleted = deleteExe();
		$PURLDeleted = deletePasswordURL();
	}

	$totalDeleted = $totalDeleted+$gibberishDeleted+$hashedDeleted+$shortDeleted+$exeDeleted+$PURLDeleted;

	if ($totalDeleted > 0)
	{
		echo "Total Removed: ".$totalDeleted."\n";
		if($gibberishDeleted > 0)
			echo "Gibberish    : ".$gibberishDeleted."\n";
		if($hashedDeleted > 0)
			echo "Hashed       : ".$hashedDeleted."\n";
		if($shortDeleted > 0)
			echo "Short        : ".$shortDeleted."\n\n";
		if($exeDeleted > 0)
			echo "EXE          : ".$exeDeleted."\n";
		if($PURLDeleted > 0)
			echo "PURL         : ".$PURLDeleted."\n";
	}
	else
		exit("Nothing was found to delete.\n");
}
else if (isset($argv[1]) && $argv[1] == "false")
{
	exit("gibberish deletes releases where the name is only letters or numbers and is 15 characters or more.\n"
		."hashed deletes releases where the name contains a string of 25 or more numbers or letters.\n"
		."short deletes releases where the name is only numbers or letters and is 5 characters or less\n"
		."exe deletes releases not in other misc or the apps sections and contains an exe file\n"
		."passwordurl deletes releases which contain a password.url file\n"
		."php removeCrapReleases.php true runs all the above\n"
		."php removeCrapReleases.php true gibberish runs only this type\n");
}
else
{
	exit("Run fixReleaseNames.php first to attempt to fix release names.\n"
		."To see an explanation of what this script does, type php removeCrapReleases.php false\n"
		."If you are sure you want to run this script, type php removeCrapReleases.php true\n"
		."You can pass 1 optional second argument:\n"
		."gibberish | hashed | short | exe | passwordurl\n");
}
?>