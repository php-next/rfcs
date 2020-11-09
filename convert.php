<?php

declare(strict_types = 1);


function convert_file_to_markdown(string $file)
{
    $changes = [
        // Titles
        '#======(.*)======#iu' => '#\1',
        '#=====(.*)=====#iu'  => '##\1',
        '#====(.*)====#iu'   => '###\1',
        '#===(.*)===#iu'    => '####\1',

        "#\[\[(.+)\|(.+)\]\]#iu" => '[\2](\1)',

        "#''#iu"            => '`',
        '#<code (.+)>#iu'   => '``` \1',
        '#</code>#iu'       =>   '```',
        '#%%(.*)%%#iu'       => '``` \1',

        '#<nowiki>(.*)</nowiki>#iu' => '\1'

    ];

    $filename = $file . '.docuwiki';
    $contents = file_get_contents($filename);

    if ($contents === false) {
        echo "Failed to read file $filename";
        exit(-1);
    }

    $new_contents = preg_replace(
        array_keys($changes),
        array_values($changes),
        $contents
    );

    $new_filename = $filename = $file . '.md';
    $file_written = file_put_contents(
        $new_filename,
        $new_contents
    );

    if ($file_written !== false) {
        echo "yay, written\n";
    }
    else {
        echo "Boo, not written, written\n";
    }
}


function convert_file_to_docuwiki(string $file)
{
  // TODO
}



convert_file_to_markdown("blank_rfc");
