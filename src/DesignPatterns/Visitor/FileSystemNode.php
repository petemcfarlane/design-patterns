<?php

namespace DesignPatterns\Visitor;

interface FileSystemNode
{
    public function accept(NodeVisitor $visitor);

    public function name();

    public function nestedLevel();

    public function setParentDir(DirectoryNode $parentDir);

    public function parentDir();
}
