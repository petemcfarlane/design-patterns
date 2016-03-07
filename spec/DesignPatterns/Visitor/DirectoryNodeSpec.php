<?php

namespace spec\DesignPatterns\Visitor;

use DesignPatterns\Visitor\DirectoryNode;
use DesignPatterns\Visitor\FileNode;
use DesignPatterns\Visitor\FileSystemNode;
use DesignPatterns\Visitor\NodeVisitor;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DirectoryNodeSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('src');
    }

    function it_implements_node()
    {
        $this->shouldImplement(FileSystemNode::class);
    }

    function it_has_a_name()
    {
        $this->name()->shouldBe('src');
    }

    function it_can_add_a_file_to_the_directory(FileNode $file)
    {
        $this->append($file);
    }

    function it_can_add_a_directory_to_the_directory(DirectoryNode $directory)
    {
        $this->append($directory);
    }

    function it_accepts_a_node_visitor(NodeVisitor $visitor)
    {
        $this->accept($visitor);

        $visitor->visit($this)->shouldHaveBeenCalled();
    }

    function it_recursively_visits_children_nodes(FileSystemNode $child1, FileSystemNode $child2, NodeVisitor $visitor)
    {
        $this->append($child1->getWrappedObject());
        $this->append($child2->getWrappedObject());

        $this->accept($visitor);

        $child1->accept($visitor)->shouldHaveBeenCalled();
        $child2->accept($visitor)->shouldHaveBeenCalled();
    }

    function it_can_have_a_parent_dir(DirectoryNode $parentDir)
    {
        $this->parentDir()->shouldBe(null);

        $this->setParentDir($parentDir);
        $this->parentDir()->shouldBe($parentDir);
    }

    function it_has_a_nested_level(DirectoryNode $pd1, DirectoryNode $pd2, DirectoryNode $pd3)
    {
        $this->nestedLevel()->shouldBe(0);

        $pd1->parentDir()->willReturn($pd2);
        $pd2->parentDir()->willReturn($pd3);
        $pd3->parentDir()->willReturn(null);

        $this->setParentDir($pd1);
        $this->nestedLevel()->shouldBe(3);
    }
}
