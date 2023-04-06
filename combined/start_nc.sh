#! /bin/sh

ncat -lvkp 54321 -e "/usr/bin/cat flag.txt"