<?php

namespace DesignPatterns\Visitor;


class DirectoryPrinterVisitor implements NodeVisitor
{
    private $output = '';

    public function visit(FileSystemNode $node)
    {
        if ($node instanceof DirectoryNode) {
            $this->output .= str_repeat('  ', $node->nestedLevel()) . $node->name() . PHP_EOL;
        }

        if ($node instanceof FileNode) {
            $this->output .= str_repeat('  ', $node->nestedLevel())  . '- ' . $node->name() . PHP_EOL;
        }
    }

    public function getOutput()
    {
        return $this->output;
    }
}
