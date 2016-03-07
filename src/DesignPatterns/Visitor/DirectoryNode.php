<?php

namespace DesignPatterns\Visitor;

class DirectoryNode implements FileSystemNode
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var FileSystemNode[]
     */
    private $children = [];

    /**
     * @var DirectoryNode
     */
    private $parentDir;

    public function __construct($name, DirectoryNode $parentDir = null)
    {
        $this->name = $name;
        $this->parentDir = $parentDir;
    }

    public function name()
    {
        return $this->name;
    }

    public function accept(NodeVisitor $visitor)
    {
        $visitor->visit($this);
        foreach ($this->children as $node) {
            $node->accept($visitor);
        }
    }

    public function append(FileSystemNode $node)
    {
        $node->setParentDir($this);
        $this->children[] = $node;

        usort($this->children, function (FileSystemNode $a, FileSystemNode $b) {
            return $a->name() > $b->name();
        });
    }

    public function nestedLevel()
    {
        $level = 0;

        $parent = $this;

        while (null !== $parent = $parent->parentDir()) {
            $level++;
        }

        return $level;
    }

    public function setParentDir(DirectoryNode $parentDir)
    {
        $this->parentDir = $parentDir;
    }

    public function parentDir()
    {
        return $this->parentDir;
    }
}
