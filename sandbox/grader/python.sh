cat test.in | python3 submission> erg 2> error
diff erg test.out > wrong
echo $? > verdict
