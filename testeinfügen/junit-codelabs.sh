#sudo bash junit-codelabs.sh test/submission.java test/test.java test/

submission=$1
test=$2
result=$3

touch $result/error $result/verdict
bash ../sandbox/codelabs/codelabs.sh -c $PWD/../sandbox/codelabs/start.sh -g $PWD/../sandbox/grader/junit.sh -s $PWD/$submission -in $PWD/$test -out /dev/null -v $PWD/$result/verdict -e $PWD/$result/error -w /dev/null -m 1g -t 10