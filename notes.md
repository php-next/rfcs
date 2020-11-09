


# Notes

[First proposal for closures](https://markmail.org/message/r7v3ejg663fpmj2d?q=list:net%2Ephp%2Elists%2Einternals+lexical&page=8#query:list%3Anet.php.lists.internals%20lexical+page:8+mid:jhk66damy4echupk+state:results)

[RFC for closures.](https://wiki.php.net/rfc/closures)


[Global vars were thought about](https://markmail.org/message/r7v3ejg663fpmj2d?q=list:net%2Ephp%2Elists%2Einternals+lexical&page=8#query:list%3Anet.php.lists.internals%20lexical+page:8+mid:orkwn7r665bofgax+state:results)


[An actually useful syntax suggestion](https://markmail.org/message/r7v3ejg663fpmj2d?q=list:net%2Ephp%2Elists%2Einternals+lexical&page=8#query:list%3Anet.php.lists.internals%20lexical+page:8+mid:55us7h4kaalx2jwp+state:results) avoided poorer choices.



[Haskell people pointing out PHP is crap](https://markmail.org/message/r7v3ejg663fpmj2d?q=list:net%2Ephp%2Elists%2Einternals+lexical&page=8#query:list%3Anet.php.lists.internals%20lexical+page:8+mid:orkwn7r665bofgax+state:results)
> Best account is this:
> 
> * A closure must only keep alive the varables it references, not the
> whole pad on which they are allocated
> [Check]
> 
> * A closure must be able to call itself recursively (via a
> higher-order function typically)
> [Check, since you can use variable you assigned closure to inside the 
> closure, if I understand correctly]
> 
> * Multiple references to the same body of code with different bindings
> must be able to exist at the same time
> [Check]
> 
> * Closures must be nestable.
>  [Dunno - does the patch allow nesting and foo(1)(2)?]


So...

```
$fibonacci = function (int $n) {
    if ($n === 0) return 0;
    if ($n === 1) return 1;
    return $lambda(n-1) + $lambda(n-2);
}
```
is better than:

```
$fibonacci = function (int $n) use (&$fibonacci) {
    if ($n === 0) return 0;
    if ($n === 1) return 1;
    return $fibonacci(n-1) + $fibonacci(n-2);
}

echo  $fibonacci(5);
```

I might propose this separately...there doesn't seem to be a reason not to, and it's a useful thing to have.



## Other stuff

Discussion around [closures and $this](https://markmail.org/message/qvy7k3h3lmzmz7p4?q=list:net%2Ephp%2Elists%2Einternals+lexical&page=8#query:list%3Anet.php.lists.internals%20lexical+page:8+mid:3hno7ciabk4l5au3+state:results), which might be relevant. Or not. Pretty sure most people are happy with how $this binding works in PHP.