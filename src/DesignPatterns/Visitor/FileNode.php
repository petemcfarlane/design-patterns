<?php

namespace DesignPatterns\Visitor;


class FileNode implements FileSystemNode
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var DirectoryNode
     */
    private $parentDir;

    /**
     * FileNode constructor.
     * @param $name
     * @param DirectoryNode $parentDir
     */
    public function __construct($name, DirectoryNode $parentDir = null)
    {
        $this->name = $name;
        $this->parentDir = $parentDir;
    }

    /**
     * @param NodeVisitor $visitor
     * @return mixed
     */
    public function accept(NodeVisitor $visitor)
    {
        $visitor->visit($this);
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    public function nestedLevel()
    {
        if ($this->parentDir() == null) {
            return 0;
        }
        return $this->parentDir()->nestedLevel();
    }

    public function parentDir()
    {
        return $this->parentDir;
    }

    public function setParentDir(DirectoryNode $parentDir)
    {
        $this->parentDir = $parentDir;
    }
}
