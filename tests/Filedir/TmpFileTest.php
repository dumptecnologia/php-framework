<?php

namespace Dump\Tests\Filedir;

use Dump\Filedir\TmpFile;
use PHPUnit\Framework\TestCase;

class TmpFileTest extends TestCase
{

    public function test_can_create_temporary_file()
    {
        $tmpFile = new TmpFile();
        $tmpFileStatic = TmpFile::new();

        $this->assertFileExists($tmpFile->path);
        $this->assertFileExists($tmpFileStatic->path);
    }

    public function test_path_file_has_in_tmp_dir()
    {
        $tmpFile = new TmpFile();

        $this->assertEquals(
            sys_get_temp_dir() . DIRECTORY_SEPARATOR,
            str_replace(basename($tmpFile->path), '', $tmpFile->path)
        );
    }

    public function test_can_delete_tmp_file()
    {
        $tmpFile = new TmpFile();

        $tmpFile->delete();

        $this->assertFileDoesNotExist($tmpFile->path);
    }

    public function test_can_write_tmp_file()
    {
        $tmpFile = new TmpFile();

        $tmpFile->write('test');

        $this->assertEquals('test', $tmpFile->getContent());
    }

    public function test_can_append_tmp_file()
    {
        $tmpFile = new TmpFile();

        $tmpFile->write('test');
        $tmpFile->write('1');

        $this->assertEquals('test1', $tmpFile->getContent());
    }


    public function test_can_preserve_tmp_file_up_to_end_request()
    {
        $tmpFile = new TmpFile();
        $path = $tmpFile->path;

        $tmpFile = null;

        $this->assertFileExists($path);
    }
}
