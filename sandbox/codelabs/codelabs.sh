#!/bin/bash

while [[ $# -gt 0 ]]; do
    case $1 in
        -c)
            c=$2
            shift
            shift
            ;;
        -g)
            g=$2
            shift
            shift
            ;;
        -s)
            s=$2
            shift
            shift
            ;;        
        -in)
            in=$2
            shift
            shift
            ;;
        -out)
            out=$2
            shift
            shift
            ;;
        -m)
            m=$2
            shift
            shift
            ;;
        -t)
            t=$2
            shift
            shift
            ;;
        -v)
            v=$2
            shift
            shift
            ;;
        -e)
            e=$2
            shift
            shift
            ;;      
        -w)
            w=$2
            shift
            shift
            ;;   
        *)
            exit -1
            ;;
    esac
done

export TIMEFORMAT=%U
time docker run \
    -v $s:/hor/submission \
    -v $g:/hor/grader \
    -v $in:/hor/test.in \
    -v $out:/hor/test.out \
    -v $c:/hor/start.sh \
    -v $v:/hor/verdict \
    -v $e:/hor/error \
    -v $w:/hor/wrong \
    -m $m hor &

for ((x=0;x<$t;x++));
do
    sleep 1
    ps | grep docker 1> /dev/null || exit 0
done

kill %1 && echo 1 > verdict && echo TLE > error
