FROM ubuntu:15.04

RUN apt-get update && apt-get install wget -y

RUN wget -q -O- https://s3.amazonaws.com/download.fpcomplete.com/ubuntu/fpco.key | apt-key add -
RUN echo 'deb http://download.fpcomplete.com/ubuntu/vivid stable main'|tee /etc/apt/sources.list.d/fpco.list
RUN apt-get update && apt-get install stack -y

WORKDIR /tmp/stack

RUN stack new --resolver=lts-2.16 && stack setup

# Install dependencies for caching this container before build
RUN stack install scotty

WORKDIR /code

ADD . /code
