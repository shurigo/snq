#!/bin/sh

# Copyright 2013 Smart Focus - All rights reserved.
#
# This software is the confidential and proprietary information of
# Predictive Intent Ltd ("Confidential Information"). You shall not disclose such
# Confidential Information and shall use it only in accordance with 
# the terms of the license agreement you entered into with Predictive Intent Ltd.
#

# Entry Class
LAUNCHER=com.predictiveintent.sdk.feeder.Main

# Resolve links - $0 may be a softlink
PRG="$0"

# Handle relative symlinks
while [ -h "$PRG" ] ; do
	LIST=`ls -ld "$PRG"`
	LINK=`expr "$LIST" : '.*-> \(.*\)$'`
	if expr "$LINK" : '/.*' > /dev/null; then
		PRG="$LINK"
	else
		PRG=`dirname "$PRG"`"/$LINK"
	fi
done

SAVEDDIR=`pwd`
ROOTDIR=`dirname "$PRG"`/..

# Get a fully qualified directory
ROOTDIR=`cd "$ROOTDIR" && pwd`

cd $ROOTDIR
echo Switched to `pwd`

CONFDIR=$ROOTDIR/conf
LIBDIR=$ROOTDIR/lib

echo "Root Dir: $ROOTDIR"
echo "Conf Dir: $CONFDIR"
echo "Lib Dir: $LIBDIR"

# Build classpath
CLASSPATH="$CONFDIR"
if [ `uname | grep -n CYGWIN` ]; then
	CLASSPATH=`cygpath --windows "$CLASSPATH"`
fi
for JAR in `ls $LIBDIR/*.jar`; do
	if [ `uname | grep -n CYGWIN` ]; then
		WINJAR=`cygpath --windows "$JAR"`
		CLASSPATH="${CLASSPATH};${WINJAR}"
	else
		CLASSPATH="${CLASSPATH}:${JAR}"
	fi
done

echo "Classpath: $CLASSPATH"

java -cp "$CLASSPATH" $LAUNCHER
exit $?
