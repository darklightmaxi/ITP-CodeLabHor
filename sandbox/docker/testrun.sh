#!/bin/bash

docker run \
    -v $PWD/submission/pythontest/submission.py:/hor/submission \
    -v $PWD/grader/python.sh:/hor/grader \
    -v $PWD/test/plus_eins/0/test.in:/hor/test.in \
    -v $PWD/test/plus_eins/0/test.out:/hor/test.out \
    -v $PWD/codelabs/start.sh:/hor/start.sh \
    -m 1g -it hor
