<?php

namespace Differ\Cli;

use function Differ\Differ\genDiff;

const DOC = <<<DOC
Generate diff

Usage:
  gendiff (-h|--help)
  gendiff (-v|--version)
  gendiff [--format <fmt>] <firstFile> <secondFile>

Options:
  -h --help                     Show this screen
  -v --version                  Show version
  --format <fmt>                Report format [default: pretty]
DOC;

function run()
{
    $args = \Docopt::handle(DOC, array('version' => "1.0.0", '<name>' => array('gendiff')));

    $pathToFileFirst = $args['<firstFile>'];
    $pathToFileSecond = $args['<secondFile>'];
    
    $differ = genDiff($pathToFileFirst, $pathToFileSecond);
    print_r($differ);
}
