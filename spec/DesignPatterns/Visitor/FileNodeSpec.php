<?php

namespace spec\DesignPatterns\Visitor;

use DesignPatterns\Visitor\DirectoryNode;
use DesignPatterns\Visitor\FileSystemNode;
use DesignPatterns\Visitor\NodeVisitor;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileNodeSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('test.txt');
    }

    function it_implements_node()
    {
        $this->shouldImplement(FileSystemNode::class);
    }

    function it_has_a_name()
    {
        $this->name()->shouldBe('test.txt');
    }

    function it_accepts_a_node_visitor(NodeVisitor $visitor)
    {
        $this->accept($visitor);

        $visitor->visit($this)->shouldHaveBeenCalled();
    }

    function it_can_have_a_parent_dir(DirectoryNode $parentDir)
    {
        $this->parentDir()->shouldBe(null);

        $this->setParentDir($parentDir);
        $this->parentDir()->shouldBe($parentDir);
    }

    function it_has_a_nested_level(DirectoryNode $parentDir)
    {
        $parentDir->nestedLevel()->willReturn(4);
        $this->beConstructedWith('text.txt', $parentDir);

        $this->nestedLevel()->shouldReturn(4);
    }
}
