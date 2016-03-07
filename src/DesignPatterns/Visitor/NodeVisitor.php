<?php

namespace DesignPatterns\Visitor;

interface NodeVisitor
{
    /**
     * @param FileSystemNode $node
     */
    public function visit(FileSystemNode $node);
}
