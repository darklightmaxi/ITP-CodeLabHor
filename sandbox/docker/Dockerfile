FROM ubuntu:bionic

RUN apt-get update
RUN apt-get -y install default-jre default-jdk junit4
RUN apt-get -y install python3

RUN export TIMEFORMAT=$U

ENTRYPOINT cd hor && bash start.sh
