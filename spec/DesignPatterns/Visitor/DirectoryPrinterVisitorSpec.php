<?php

namespace spec\DesignPatterns\Visitor;

use DesignPatterns\Visitor\DirectoryNode;
use DesignPatterns\Visitor\FileNode;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DirectoryPrinterVisitorSpec extends ObjectBehavior
{
    function it_is_visited_with_a_directory(DirectoryNode $directory)
    {
        $directory->name()->willReturn('src');
        $directory->nestedLevel()->willReturn(0);

        $this->visit($directory);
        $this->getOutput()->shouldReturn('src' . PHP_EOL);
    }

    function it_is_visited_with_a_file(FileNode $file)
    {
        $file->name()->willReturn('test.xml');
        $file->nestedLevel()->willReturn(0);

        $this->visit($file);
        $this->getOutput()->shouldReturn("- test.xml" . PHP_EOL);
    }

    function it_visits_a_nested_directory(DirectoryNode $directory)
    {
        $directory->name()->willReturn('Foo');
        $directory->nestedLevel()->willReturn(1);

        $this->visit($directory);
        $this->getOutput()->shouldReturn('  Foo' . PHP_EOL);
    }

    function it_visits_a_nested_file(FileNode $file)
    {
        $file->name()->willReturn('bar.txt');
        $file->nestedLevel()->willReturn(2);

        $this->visit($file);
        $this->getOutput()->shouldReturn('    - bar.txt' . PHP_EOL);
    }

    function it_visits_a_filesystem()
    {
        $root = new DirectoryNode('root');
        $src = new DirectoryNode('src');
        $src->append(new FileNode('foo.php'));
        $src->append(new FileNode('bar.php'));
        $spec = new DirectoryNode('spec');
        $spec->append(new FileNode('fooSpec.php'));
        $spec->append(new FileNode('barSpec.php'));
        $root->append($src);
        $root->append($spec);


        $root->accept($this->getWrappedObject());
        $this->getOutput()->shouldReturn(<<<EOT
root
  spec
  - barSpec.php
  - fooSpec.php
  src
  - bar.php
  - foo.php

EOT
        );
    }
}
