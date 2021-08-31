# https://docs.docker.com/develop/develop-images/multistage-build/#stop-at-a-specific-build-stage
# https://docs.docker.com/compose/compose-file/#target


# https://docs.docker.com/engine/reference/builder/#understand-how-arg-and-from-interact
ARG NODE_VERSION=14

# "common" stage
FROM node:${NODE_VERSION}-alpine AS yawik_nuxt_common

EXPOSE 3000

WORKDIR /usr/src/pwa

ENV NEXT_TELEMETRY_DISABLED 1

# "development" stage
# depends on the "common" stage above
FROM yawik_nuxt_common AS yawik_nuxt_dev

#ENV API_PLATFORM_CLIENT_GENERATOR_OUTPUT .
#RUN yarn global add @api-platform/client-generator

CMD ["yarn", "dev"]


# "build" stage
# depends on the "common" stage above
FROM yawik_nuxt_common AS yawik_nuxt_prod

ENV NODE_ENV production
ARG NEXT_PUBLIC_ENTRYPOINT

# prevent the reinstallation of node modules at every changes in the source code
COPY package.json yarn.lock ./
RUN yarn

COPY . ./

VOLUME /usr/src/pwa/node_modules

RUN set -eux; \
	yarn build

CMD ["yarn", "build"]
