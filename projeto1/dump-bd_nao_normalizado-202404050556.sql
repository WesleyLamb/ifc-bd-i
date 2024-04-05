--
-- PostgreSQL database cluster dump
--

-- Started on 2024-04-05 09:10:17 UTC

SET default_transaction_read_only = off;

SET client_encoding = 'LATIN1';
SET standard_conforming_strings = on;

--
-- Roles
--

CREATE ROLE docker;
ALTER ROLE docker WITH SUPERUSER INHERIT CREATEROLE CREATEDB LOGIN REPLICATION BYPASSRLS;

--
-- User Configurations
--








--
-- Databases
--

--
-- Database "template1" dump
--

\connect template1

--
-- PostgreSQL database dump
--

-- Dumped from database version 16.2
-- Dumped by pg_dump version 16.2

-- Started on 2024-04-05 09:10:17 UTC

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'LATIN1';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

-- Completed on 2024-04-05 09:10:18 UTC

--
-- PostgreSQL database dump complete
--

--
-- Database "bd_nao_normalizado" dump
--

--
-- PostgreSQL database dump
--

-- Dumped from database version 16.2
-- Dumped by pg_dump version 16.2

-- Started on 2024-04-05 09:10:18 UTC

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'LATIN1';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3410 (class 1262 OID 16389)
-- Name: bd_nao_normalizado; Type: DATABASE; Schema: -; Owner: docker
--

CREATE DATABASE bd_nao_normalizado WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'en_US.utf8';


ALTER DATABASE bd_nao_normalizado OWNER TO docker;

\connect bd_nao_normalizado

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'LATIN1';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 215 (class 1259 OID 16390)
-- Name: seq_aventureiros; Type: SEQUENCE; Schema: public; Owner: docker
--

CREATE SEQUENCE public.seq_aventureiros
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.seq_aventureiros OWNER TO docker;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 218 (class 1259 OID 16398)
-- Name: aventureiros; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.aventureiros (
    id integer DEFAULT nextval('public.seq_aventureiros'::regclass) NOT NULL,
    aventureiro character varying(200) NOT NULL,
    inventario text,
    classe_id integer NOT NULL,
    classe character varying(50) NOT NULL,
    habilidades text,
    vida integer NOT NULL,
    mana integer NOT NULL,
    dano integer NOT NULL,
    nivel integer NOT NULL
);


ALTER TABLE public.aventureiros OWNER TO docker;

--
-- TOC entry 216 (class 1259 OID 16391)
-- Name: seq_classes; Type: SEQUENCE; Schema: public; Owner: docker
--

CREATE SEQUENCE public.seq_classes
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.seq_classes OWNER TO docker;

--
-- TOC entry 217 (class 1259 OID 16392)
-- Name: classes; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.classes (
    id integer DEFAULT nextval('public.seq_classes'::regclass) NOT NULL,
    classe character varying(50) NOT NULL
);


ALTER TABLE public.classes OWNER TO docker;

--
-- TOC entry 3404 (class 0 OID 16398)
-- Dependencies: 218
-- Data for Name: aventureiros; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.aventureiros (id, aventureiro, inventario, classe_id, classe, habilidades, vida, mana, dano, nivel) FROM stdin;
1	Frieren	1 cajado, 1 maleta	1	Mago	Míssil mágico, Barreira mágica, Voar, Ocultação de mana	100	100	13	1
2	Fern	1 cajado	1	Mago	Míssil mágico, Barreira mágica, Voar, Ocultação de mana	100	100	13	1
3	Gandalf	1 cajado, 1 espada	1	Mago	Afastar espíritos, Invocação	100	100	13	1
4	Bilbo Bolseiro	1 espada, 1 anel	8	Ladrão	Invisibilidade, Barganha	50	0	5	1
5	Legolas	1 Arco e flecha	5	Arqueiro	Multi-disparo	75	0	20	1
\.


--
-- TOC entry 3403 (class 0 OID 16392)
-- Dependencies: 217
-- Data for Name: classes; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.classes (id, classe) FROM stdin;
1	Mago
2	Paladino
3	Bárbaro
4	Lanceiro
5	Arqueiro
6	Espadachim
7	Clérigo
8	Ladrão
\.


--
-- TOC entry 3411 (class 0 OID 0)
-- Dependencies: 215
-- Name: seq_aventureiros; Type: SEQUENCE SET; Schema: public; Owner: docker
--

SELECT pg_catalog.setval('public.seq_aventureiros', 5, true);


--
-- TOC entry 3412 (class 0 OID 0)
-- Dependencies: 216
-- Name: seq_classes; Type: SEQUENCE SET; Schema: public; Owner: docker
--

SELECT pg_catalog.setval('public.seq_classes', 8, true);


--
-- TOC entry 3256 (class 2606 OID 16405)
-- Name: aventureiros aventureiros_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.aventureiros
    ADD CONSTRAINT aventureiros_pk PRIMARY KEY (id);


--
-- TOC entry 3254 (class 2606 OID 16397)
-- Name: classes classes_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.classes
    ADD CONSTRAINT classes_pk PRIMARY KEY (id);


--
-- TOC entry 3257 (class 2606 OID 16406)
-- Name: aventureiros aventureiros_classes_fk; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.aventureiros
    ADD CONSTRAINT aventureiros_classes_fk FOREIGN KEY (classe_id) REFERENCES public.classes(id);


-- Completed on 2024-04-05 09:10:18 UTC

--
-- PostgreSQL database dump complete
--

--
-- Database "db_1a_forma_normal" dump
--

--
-- PostgreSQL database dump
--

-- Dumped from database version 16.2
-- Dumped by pg_dump version 16.2

-- Started on 2024-04-05 09:10:18 UTC

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'LATIN1';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3440 (class 1262 OID 16411)
-- Name: db_1a_forma_normal; Type: DATABASE; Schema: -; Owner: docker
--

CREATE DATABASE db_1a_forma_normal WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'en_US.utf8';


ALTER DATABASE db_1a_forma_normal OWNER TO docker;

\connect db_1a_forma_normal

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'LATIN1';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 220 (class 1259 OID 16430)
-- Name: seq_aventureiros; Type: SEQUENCE; Schema: public; Owner: docker
--

CREATE SEQUENCE public.seq_aventureiros
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.seq_aventureiros OWNER TO docker;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 221 (class 1259 OID 16431)
-- Name: aventureiros; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.aventureiros (
    id integer DEFAULT nextval('public.seq_aventureiros'::regclass) NOT NULL,
    aventureiro character varying(200) NOT NULL,
    classe_id integer NOT NULL,
    classe character varying(50) NOT NULL,
    vida integer NOT NULL,
    mana integer NOT NULL,
    dano integer NOT NULL,
    nivel integer NOT NULL
);


ALTER TABLE public.aventureiros OWNER TO docker;

--
-- TOC entry 218 (class 1259 OID 16423)
-- Name: seq_classes; Type: SEQUENCE; Schema: public; Owner: docker
--

CREATE SEQUENCE public.seq_classes
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.seq_classes OWNER TO docker;

--
-- TOC entry 219 (class 1259 OID 16424)
-- Name: classes; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.classes (
    id integer DEFAULT nextval('public.seq_classes'::regclass) NOT NULL,
    classe character varying(50) NOT NULL
);


ALTER TABLE public.classes OWNER TO docker;

--
-- TOC entry 217 (class 1259 OID 16419)
-- Name: seq_habilidades; Type: SEQUENCE; Schema: public; Owner: docker
--

CREATE SEQUENCE public.seq_habilidades
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.seq_habilidades OWNER TO docker;

--
-- TOC entry 223 (class 1259 OID 16457)
-- Name: habilidades; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.habilidades (
    id integer DEFAULT nextval('public.seq_habilidades'::regclass) NOT NULL,
    aventureiro_id integer NOT NULL,
    habilidade character varying(50) NOT NULL
);


ALTER TABLE public.habilidades OWNER TO docker;

--
-- TOC entry 222 (class 1259 OID 16442)
-- Name: inventarios; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.inventarios (
    aventureiro_id integer NOT NULL,
    item_id integer NOT NULL,
    item character varying(200) NOT NULL,
    quantidade integer NOT NULL
);


ALTER TABLE public.inventarios OWNER TO docker;

--
-- TOC entry 215 (class 1259 OID 16412)
-- Name: seq_itens; Type: SEQUENCE; Schema: public; Owner: docker
--

CREATE SEQUENCE public.seq_itens
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.seq_itens OWNER TO docker;

--
-- TOC entry 216 (class 1259 OID 16413)
-- Name: itens; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.itens (
    id integer DEFAULT nextval('public.seq_itens'::regclass) NOT NULL,
    item character varying(200) NOT NULL
);


ALTER TABLE public.itens OWNER TO docker;

--
-- TOC entry 3432 (class 0 OID 16431)
-- Dependencies: 221
-- Data for Name: aventureiros; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.aventureiros (id, aventureiro, classe_id, classe, vida, mana, dano, nivel) FROM stdin;
1	Frieren	1	Mago	100	100	13	1
2	Fern	1	Mago	100	100	13	1
3	Gandalf	1	Mago	100	100	13	1
4	Bilbo Bolseiro	8	Ladrão	50	0	5	1
5	Legolas	5	Arqueiro	75	0	20	1
\.


--
-- TOC entry 3430 (class 0 OID 16424)
-- Dependencies: 219
-- Data for Name: classes; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.classes (id, classe) FROM stdin;
1	Mago
2	Paladino
3	Bárbaro
4	Lanceiro
5	Arqueiro
6	Espadachim
7	Clérigo
8	Ladrão
\.


--
-- TOC entry 3434 (class 0 OID 16457)
-- Dependencies: 223
-- Data for Name: habilidades; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.habilidades (id, aventureiro_id, habilidade) FROM stdin;
1	1	Míssil mágico
2	1	Barreira mágica
3	1	Voar
4	1	Ocultação de mana
5	2	Míssil mágico
6	2	Barreira mágica
7	2	Voar
8	2	Ocultação de mana
9	3	Afastar espíritos
10	3	Invocação
11	4	Invisibilidade
12	4	Barganha
13	5	Multi-disparo
\.


--
-- TOC entry 3433 (class 0 OID 16442)
-- Dependencies: 222
-- Data for Name: inventarios; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.inventarios (aventureiro_id, item_id, item, quantidade) FROM stdin;
1	1	Cajado	1
1	2	Maleta	1
2	1	Cajado	1
3	1	Cajado	1
3	3	Espada	1
4	3	Espada	1
4	5	Anel	1
5	4	Arco e flecha	1
\.


--
-- TOC entry 3427 (class 0 OID 16413)
-- Dependencies: 216
-- Data for Name: itens; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.itens (id, item) FROM stdin;
1	Cajado
2	Maleta
3	Espada
4	Arco e flecha
5	Anel
\.


--
-- TOC entry 3441 (class 0 OID 0)
-- Dependencies: 220
-- Name: seq_aventureiros; Type: SEQUENCE SET; Schema: public; Owner: docker
--

SELECT pg_catalog.setval('public.seq_aventureiros', 5, true);


--
-- TOC entry 3442 (class 0 OID 0)
-- Dependencies: 218
-- Name: seq_classes; Type: SEQUENCE SET; Schema: public; Owner: docker
--

SELECT pg_catalog.setval('public.seq_classes', 8, true);


--
-- TOC entry 3443 (class 0 OID 0)
-- Dependencies: 217
-- Name: seq_habilidades; Type: SEQUENCE SET; Schema: public; Owner: docker
--

SELECT pg_catalog.setval('public.seq_habilidades', 13, true);


--
-- TOC entry 3444 (class 0 OID 0)
-- Dependencies: 215
-- Name: seq_itens; Type: SEQUENCE SET; Schema: public; Owner: docker
--

SELECT pg_catalog.setval('public.seq_itens', 5, true);


--
-- TOC entry 3274 (class 2606 OID 16436)
-- Name: aventureiros aventureiros_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.aventureiros
    ADD CONSTRAINT aventureiros_pk PRIMARY KEY (id);


--
-- TOC entry 3272 (class 2606 OID 16429)
-- Name: classes classes_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.classes
    ADD CONSTRAINT classes_pk PRIMARY KEY (id);


--
-- TOC entry 3278 (class 2606 OID 16462)
-- Name: habilidades habilidades_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.habilidades
    ADD CONSTRAINT habilidades_pk PRIMARY KEY (id);


--
-- TOC entry 3276 (class 2606 OID 16446)
-- Name: inventarios inventarios_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.inventarios
    ADD CONSTRAINT inventarios_pk PRIMARY KEY (aventureiro_id, item_id);


--
-- TOC entry 3270 (class 2606 OID 16418)
-- Name: itens itens_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.itens
    ADD CONSTRAINT itens_pk PRIMARY KEY (id);


--
-- TOC entry 3279 (class 2606 OID 16437)
-- Name: aventureiros aventureiros_classes_fk; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.aventureiros
    ADD CONSTRAINT aventureiros_classes_fk FOREIGN KEY (classe_id) REFERENCES public.classes(id);


--
-- TOC entry 3282 (class 2606 OID 16463)
-- Name: habilidades habilidades_aventureiros_fk; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.habilidades
    ADD CONSTRAINT habilidades_aventureiros_fk FOREIGN KEY (aventureiro_id) REFERENCES public.aventureiros(id);


--
-- TOC entry 3280 (class 2606 OID 16447)
-- Name: inventarios inventarios_aventureiros_fk; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.inventarios
    ADD CONSTRAINT inventarios_aventureiros_fk FOREIGN KEY (aventureiro_id) REFERENCES public.aventureiros(id);


--
-- TOC entry 3281 (class 2606 OID 16452)
-- Name: inventarios inventarios_itens_fk; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.inventarios
    ADD CONSTRAINT inventarios_itens_fk FOREIGN KEY (item_id) REFERENCES public.itens(id);


-- Completed on 2024-04-05 09:10:18 UTC

--
-- PostgreSQL database dump complete
--

--
-- Database "db_2a_forma_normal" dump
--

--
-- PostgreSQL database dump
--

-- Dumped from database version 16.2
-- Dumped by pg_dump version 16.2

-- Started on 2024-04-05 09:10:18 UTC

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'LATIN1';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3440 (class 1262 OID 16468)
-- Name: db_2a_forma_normal; Type: DATABASE; Schema: -; Owner: docker
--

CREATE DATABASE db_2a_forma_normal WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'en_US.utf8';


ALTER DATABASE db_2a_forma_normal OWNER TO docker;

\connect db_2a_forma_normal

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'LATIN1';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 220 (class 1259 OID 16430)
-- Name: seq_aventureiros; Type: SEQUENCE; Schema: public; Owner: docker
--

CREATE SEQUENCE public.seq_aventureiros
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.seq_aventureiros OWNER TO docker;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 221 (class 1259 OID 16431)
-- Name: aventureiros; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.aventureiros (
    id integer DEFAULT nextval('public.seq_aventureiros'::regclass) NOT NULL,
    aventureiro character varying(200) NOT NULL,
    classe_id integer NOT NULL,
    vida integer NOT NULL,
    mana integer NOT NULL,
    dano integer NOT NULL,
    nivel integer NOT NULL
);


ALTER TABLE public.aventureiros OWNER TO docker;

--
-- TOC entry 218 (class 1259 OID 16423)
-- Name: seq_classes; Type: SEQUENCE; Schema: public; Owner: docker
--

CREATE SEQUENCE public.seq_classes
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.seq_classes OWNER TO docker;

--
-- TOC entry 219 (class 1259 OID 16424)
-- Name: classes; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.classes (
    id integer DEFAULT nextval('public.seq_classes'::regclass) NOT NULL,
    classe character varying(50) NOT NULL
);


ALTER TABLE public.classes OWNER TO docker;

--
-- TOC entry 217 (class 1259 OID 16419)
-- Name: seq_habilidades; Type: SEQUENCE; Schema: public; Owner: docker
--

CREATE SEQUENCE public.seq_habilidades
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.seq_habilidades OWNER TO docker;

--
-- TOC entry 223 (class 1259 OID 16457)
-- Name: habilidades; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.habilidades (
    id integer DEFAULT nextval('public.seq_habilidades'::regclass) NOT NULL,
    aventureiro_id integer NOT NULL,
    habilidade character varying(50) NOT NULL
);


ALTER TABLE public.habilidades OWNER TO docker;

--
-- TOC entry 222 (class 1259 OID 16442)
-- Name: inventarios; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.inventarios (
    aventureiro_id integer NOT NULL,
    item_id integer NOT NULL,
    quantidade integer NOT NULL
);


ALTER TABLE public.inventarios OWNER TO docker;

--
-- TOC entry 215 (class 1259 OID 16412)
-- Name: seq_itens; Type: SEQUENCE; Schema: public; Owner: docker
--

CREATE SEQUENCE public.seq_itens
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.seq_itens OWNER TO docker;

--
-- TOC entry 216 (class 1259 OID 16413)
-- Name: itens; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.itens (
    id integer DEFAULT nextval('public.seq_itens'::regclass) NOT NULL,
    item character varying(200) NOT NULL
);


ALTER TABLE public.itens OWNER TO docker;

--
-- TOC entry 3432 (class 0 OID 16431)
-- Dependencies: 221
-- Data for Name: aventureiros; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.aventureiros (id, aventureiro, classe_id, vida, mana, dano, nivel) FROM stdin;
1	Frieren	1	100	100	13	1
2	Fern	1	100	100	13	1
3	Gandalf	1	100	100	13	1
4	Bilbo Bolseiro	8	50	0	5	1
5	Legolas	5	75	0	20	1
\.


--
-- TOC entry 3430 (class 0 OID 16424)
-- Dependencies: 219
-- Data for Name: classes; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.classes (id, classe) FROM stdin;
1	Mago
2	Paladino
3	Bárbaro
4	Lanceiro
5	Arqueiro
6	Espadachim
7	Clérigo
8	Ladrão
\.


--
-- TOC entry 3434 (class 0 OID 16457)
-- Dependencies: 223
-- Data for Name: habilidades; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.habilidades (id, aventureiro_id, habilidade) FROM stdin;
1	1	Míssil mágico
2	1	Barreira mágica
3	1	Voar
4	1	Ocultação de mana
5	2	Míssil mágico
6	2	Barreira mágica
7	2	Voar
8	2	Ocultação de mana
9	3	Afastar espíritos
10	3	Invocação
11	4	Invisibilidade
12	4	Barganha
13	5	Multi-disparo
\.


--
-- TOC entry 3433 (class 0 OID 16442)
-- Dependencies: 222
-- Data for Name: inventarios; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.inventarios (aventureiro_id, item_id, quantidade) FROM stdin;
1	1	1
1	2	1
2	1	1
3	1	1
3	3	1
4	3	1
4	5	1
5	4	1
\.


--
-- TOC entry 3427 (class 0 OID 16413)
-- Dependencies: 216
-- Data for Name: itens; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.itens (id, item) FROM stdin;
1	Cajado
2	Maleta
3	Espada
4	Arco e flecha
5	Anel
\.


--
-- TOC entry 3441 (class 0 OID 0)
-- Dependencies: 220
-- Name: seq_aventureiros; Type: SEQUENCE SET; Schema: public; Owner: docker
--

SELECT pg_catalog.setval('public.seq_aventureiros', 5, true);


--
-- TOC entry 3442 (class 0 OID 0)
-- Dependencies: 218
-- Name: seq_classes; Type: SEQUENCE SET; Schema: public; Owner: docker
--

SELECT pg_catalog.setval('public.seq_classes', 8, true);


--
-- TOC entry 3443 (class 0 OID 0)
-- Dependencies: 217
-- Name: seq_habilidades; Type: SEQUENCE SET; Schema: public; Owner: docker
--

SELECT pg_catalog.setval('public.seq_habilidades', 13, true);


--
-- TOC entry 3444 (class 0 OID 0)
-- Dependencies: 215
-- Name: seq_itens; Type: SEQUENCE SET; Schema: public; Owner: docker
--

SELECT pg_catalog.setval('public.seq_itens', 5, true);


--
-- TOC entry 3274 (class 2606 OID 16436)
-- Name: aventureiros aventureiros_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.aventureiros
    ADD CONSTRAINT aventureiros_pk PRIMARY KEY (id);


--
-- TOC entry 3272 (class 2606 OID 16429)
-- Name: classes classes_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.classes
    ADD CONSTRAINT classes_pk PRIMARY KEY (id);


--
-- TOC entry 3278 (class 2606 OID 16462)
-- Name: habilidades habilidades_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.habilidades
    ADD CONSTRAINT habilidades_pk PRIMARY KEY (id);


--
-- TOC entry 3276 (class 2606 OID 16446)
-- Name: inventarios inventarios_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.inventarios
    ADD CONSTRAINT inventarios_pk PRIMARY KEY (aventureiro_id, item_id);


--
-- TOC entry 3270 (class 2606 OID 16418)
-- Name: itens itens_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.itens
    ADD CONSTRAINT itens_pk PRIMARY KEY (id);


--
-- TOC entry 3279 (class 2606 OID 16437)
-- Name: aventureiros aventureiros_classes_fk; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.aventureiros
    ADD CONSTRAINT aventureiros_classes_fk FOREIGN KEY (classe_id) REFERENCES public.classes(id);


--
-- TOC entry 3282 (class 2606 OID 16463)
-- Name: habilidades habilidades_aventureiros_fk; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.habilidades
    ADD CONSTRAINT habilidades_aventureiros_fk FOREIGN KEY (aventureiro_id) REFERENCES public.aventureiros(id);


--
-- TOC entry 3280 (class 2606 OID 16447)
-- Name: inventarios inventarios_aventureiros_fk; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.inventarios
    ADD CONSTRAINT inventarios_aventureiros_fk FOREIGN KEY (aventureiro_id) REFERENCES public.aventureiros(id);


--
-- TOC entry 3281 (class 2606 OID 16452)
-- Name: inventarios inventarios_itens_fk; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.inventarios
    ADD CONSTRAINT inventarios_itens_fk FOREIGN KEY (item_id) REFERENCES public.itens(id);


-- Completed on 2024-04-05 09:10:18 UTC

--
-- PostgreSQL database dump complete
--

--
-- Database "db_3a_forma_normal" dump
--

--
-- PostgreSQL database dump
--

-- Dumped from database version 16.2
-- Dumped by pg_dump version 16.2

-- Started on 2024-04-05 09:10:18 UTC

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'LATIN1';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3448 (class 1262 OID 16469)
-- Name: db_3a_forma_normal; Type: DATABASE; Schema: -; Owner: docker
--

CREATE DATABASE db_3a_forma_normal WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'en_US.utf8';


ALTER DATABASE db_3a_forma_normal OWNER TO docker;

\connect db_3a_forma_normal

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'LATIN1';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 220 (class 1259 OID 16430)
-- Name: seq_aventureiros; Type: SEQUENCE; Schema: public; Owner: docker
--

CREATE SEQUENCE public.seq_aventureiros
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.seq_aventureiros OWNER TO docker;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 221 (class 1259 OID 16431)
-- Name: aventureiros; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.aventureiros (
    id integer DEFAULT nextval('public.seq_aventureiros'::regclass) NOT NULL,
    aventureiro character varying(200) NOT NULL,
    classe_id integer NOT NULL,
    nivel integer NOT NULL
);


ALTER TABLE public.aventureiros OWNER TO docker;

--
-- TOC entry 218 (class 1259 OID 16423)
-- Name: seq_classes; Type: SEQUENCE; Schema: public; Owner: docker
--

CREATE SEQUENCE public.seq_classes
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.seq_classes OWNER TO docker;

--
-- TOC entry 219 (class 1259 OID 16424)
-- Name: classes; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.classes (
    id integer DEFAULT nextval('public.seq_classes'::regclass) NOT NULL,
    classe character varying(50) NOT NULL
);


ALTER TABLE public.classes OWNER TO docker;

--
-- TOC entry 217 (class 1259 OID 16419)
-- Name: seq_habilidades; Type: SEQUENCE; Schema: public; Owner: docker
--

CREATE SEQUENCE public.seq_habilidades
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.seq_habilidades OWNER TO docker;

--
-- TOC entry 223 (class 1259 OID 16457)
-- Name: habilidades; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.habilidades (
    id integer DEFAULT nextval('public.seq_habilidades'::regclass) NOT NULL,
    aventureiro_id integer NOT NULL,
    habilidade character varying(50) NOT NULL
);


ALTER TABLE public.habilidades OWNER TO docker;

--
-- TOC entry 222 (class 1259 OID 16442)
-- Name: inventarios; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.inventarios (
    aventureiro_id integer NOT NULL,
    item_id integer NOT NULL,
    quantidade integer NOT NULL
);


ALTER TABLE public.inventarios OWNER TO docker;

--
-- TOC entry 215 (class 1259 OID 16412)
-- Name: seq_itens; Type: SEQUENCE; Schema: public; Owner: docker
--

CREATE SEQUENCE public.seq_itens
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.seq_itens OWNER TO docker;

--
-- TOC entry 216 (class 1259 OID 16413)
-- Name: itens; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.itens (
    id integer DEFAULT nextval('public.seq_itens'::regclass) NOT NULL,
    item character varying(200) NOT NULL
);


ALTER TABLE public.itens OWNER TO docker;

--
-- TOC entry 224 (class 1259 OID 16470)
-- Name: niveis; Type: TABLE; Schema: public; Owner: docker
--

CREATE TABLE public.niveis (
    nivel integer NOT NULL,
    classe_id integer NOT NULL,
    dano integer NOT NULL,
    vida integer,
    mana integer
);


ALTER TABLE public.niveis OWNER TO docker;

--
-- TOC entry 3439 (class 0 OID 16431)
-- Dependencies: 221
-- Data for Name: aventureiros; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.aventureiros (id, aventureiro, classe_id, nivel) FROM stdin;
1	Frieren	1	1
2	Fern	1	1
3	Gandalf	1	1
4	Bilbo Bolseiro	8	1
5	Legolas	5	1
\.


--
-- TOC entry 3437 (class 0 OID 16424)
-- Dependencies: 219
-- Data for Name: classes; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.classes (id, classe) FROM stdin;
1	Mago
2	Paladino
3	Bárbaro
4	Lanceiro
5	Arqueiro
6	Espadachim
7	Clérigo
8	Ladrão
\.


--
-- TOC entry 3441 (class 0 OID 16457)
-- Dependencies: 223
-- Data for Name: habilidades; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.habilidades (id, aventureiro_id, habilidade) FROM stdin;
1	1	Míssil mágico
2	1	Barreira mágica
3	1	Voar
4	1	Ocultação de mana
5	2	Míssil mágico
6	2	Barreira mágica
7	2	Voar
8	2	Ocultação de mana
9	3	Afastar espíritos
10	3	Invocação
11	4	Invisibilidade
12	4	Barganha
13	5	Multi-disparo
\.


--
-- TOC entry 3440 (class 0 OID 16442)
-- Dependencies: 222
-- Data for Name: inventarios; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.inventarios (aventureiro_id, item_id, quantidade) FROM stdin;
1	1	1
1	2	1
2	1	1
3	1	1
3	3	1
4	3	1
4	5	1
5	4	1
\.


--
-- TOC entry 3434 (class 0 OID 16413)
-- Dependencies: 216
-- Data for Name: itens; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.itens (id, item) FROM stdin;
1	Cajado
2	Maleta
3	Espada
4	Arco e flecha
5	Anel
\.


--
-- TOC entry 3442 (class 0 OID 16470)
-- Dependencies: 224
-- Data for Name: niveis; Type: TABLE DATA; Schema: public; Owner: docker
--

COPY public.niveis (nivel, classe_id, dano, vida, mana) FROM stdin;
1	1	13	100	100
2	1	17	105	150
3	1	22	110	200
1	2	12	200	50
2	2	15	225	60
3	2	19	250	70
1	3	22	150	0
2	3	25	170	0
3	3	28	190	0
1	4	18	175	50
2	4	21	200	70
3	4	24	225	90
1	5	17	75	0
2	5	20	90	0
3	5	23	105	0
1	6	20	200	50
2	6	23	220	60
3	6	26	240	70
1	7	7	70	100
2	7	9	80	120
3	7	11	90	140
1	8	5	100	20
2	8	8	110	40
3	8	11	120	60
\.


--
-- TOC entry 3449 (class 0 OID 0)
-- Dependencies: 220
-- Name: seq_aventureiros; Type: SEQUENCE SET; Schema: public; Owner: docker
--

SELECT pg_catalog.setval('public.seq_aventureiros', 5, true);


--
-- TOC entry 3450 (class 0 OID 0)
-- Dependencies: 218
-- Name: seq_classes; Type: SEQUENCE SET; Schema: public; Owner: docker
--

SELECT pg_catalog.setval('public.seq_classes', 8, true);


--
-- TOC entry 3451 (class 0 OID 0)
-- Dependencies: 217
-- Name: seq_habilidades; Type: SEQUENCE SET; Schema: public; Owner: docker
--

SELECT pg_catalog.setval('public.seq_habilidades', 13, true);


--
-- TOC entry 3452 (class 0 OID 0)
-- Dependencies: 215
-- Name: seq_itens; Type: SEQUENCE SET; Schema: public; Owner: docker
--

SELECT pg_catalog.setval('public.seq_itens', 5, true);


--
-- TOC entry 3278 (class 2606 OID 16436)
-- Name: aventureiros aventureiros_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.aventureiros
    ADD CONSTRAINT aventureiros_pk PRIMARY KEY (id);


--
-- TOC entry 3276 (class 2606 OID 16429)
-- Name: classes classes_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.classes
    ADD CONSTRAINT classes_pk PRIMARY KEY (id);


--
-- TOC entry 3282 (class 2606 OID 16462)
-- Name: habilidades habilidades_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.habilidades
    ADD CONSTRAINT habilidades_pk PRIMARY KEY (id);


--
-- TOC entry 3280 (class 2606 OID 16446)
-- Name: inventarios inventarios_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.inventarios
    ADD CONSTRAINT inventarios_pk PRIMARY KEY (aventureiro_id, item_id);


--
-- TOC entry 3274 (class 2606 OID 16418)
-- Name: itens itens_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.itens
    ADD CONSTRAINT itens_pk PRIMARY KEY (id);


--
-- TOC entry 3284 (class 2606 OID 16476)
-- Name: niveis niveis_pk; Type: CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.niveis
    ADD CONSTRAINT niveis_pk PRIMARY KEY (nivel, classe_id);


--
-- TOC entry 3285 (class 2606 OID 16437)
-- Name: aventureiros aventureiros_classes_fk; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.aventureiros
    ADD CONSTRAINT aventureiros_classes_fk FOREIGN KEY (classe_id) REFERENCES public.classes(id);


--
-- TOC entry 3288 (class 2606 OID 16463)
-- Name: habilidades habilidades_aventureiros_fk; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.habilidades
    ADD CONSTRAINT habilidades_aventureiros_fk FOREIGN KEY (aventureiro_id) REFERENCES public.aventureiros(id);


--
-- TOC entry 3286 (class 2606 OID 16447)
-- Name: inventarios inventarios_aventureiros_fk; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.inventarios
    ADD CONSTRAINT inventarios_aventureiros_fk FOREIGN KEY (aventureiro_id) REFERENCES public.aventureiros(id);


--
-- TOC entry 3287 (class 2606 OID 16452)
-- Name: inventarios inventarios_itens_fk; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.inventarios
    ADD CONSTRAINT inventarios_itens_fk FOREIGN KEY (item_id) REFERENCES public.itens(id);


--
-- TOC entry 3289 (class 2606 OID 16477)
-- Name: niveis niveis_classes_fk; Type: FK CONSTRAINT; Schema: public; Owner: docker
--

ALTER TABLE ONLY public.niveis
    ADD CONSTRAINT niveis_classes_fk FOREIGN KEY (classe_id) REFERENCES public.classes(id);


-- Completed on 2024-04-05 09:10:18 UTC

--
-- PostgreSQL database dump complete
--

-- Completed on 2024-04-05 09:10:18 UTC

--
-- PostgreSQL database cluster dump complete
--

