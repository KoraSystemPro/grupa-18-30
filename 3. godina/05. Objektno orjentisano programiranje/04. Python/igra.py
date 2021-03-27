# Importujemo pygame biblioteku
import pygame
from pygame.locals import *

# Inicijalizuje pygame
pygame.init()

# KONSTANTE
SIRINA_EKRANA = 800
VISINA_EKRANA = 600

# Pravimo ekran na kome cemo da crtamo sve
canvas = pygame.display.set_mode((SIRINA_EKRANA, VISINA_EKRANA))


# Glavna petlja radi sve dok korisnik ne pritisne kraj
playing = True
while playing:
    for event in pygame.event.get():
        # Ako je pritisnuto X dugme, izlazi iz igre
        if event.type == pygame.QUIT:
            playing = False
        elif event.type == KEYDOWN:
            # Da li je pritinsut ESC dugme
            if event.key == K_ESCAPE:
                playing = False

    # Farba ekran u svetlo plavu
    canvas.fill((145, 244, 255))
    
    # Pravimo igraca
    igrac = pygame.Surface((50, 50))
    # Farba igraca
    igrac.fill((230, 230, 230))
    
    canvas.blit(igrac, (SIRINA_EKRANA/2, VISINA_EKRANA/2))



    # Prikazuje frejm
    pygame.display.flip()

# Brise canvas i zatvara program
pygame.quit()