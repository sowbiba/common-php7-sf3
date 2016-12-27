#!/bin/bash

INVENTORY="local"

ENV="setupServerLocal"

echo "Create local environnement"
ansible-playbook --ask-sudo-pass -i inventory/$INVENTORY setupServer.yml -l local --extra-vars "inventory=$INVENTORY user=coifsn"

